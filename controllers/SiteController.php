<?php

namespace app\controllers;

use app\actions\CountersAction;
use app\actions\RegisterCompanyAction;
use app\models\CompanyInfo;
use app\models\Directions;
use app\models\Employees;
use app\models\Mailer;
use app\models\PlacementRequests;
use app\models\Regions;
use app\models\RegisterCompanyForm;
use Yii;
use app\components\AppController;
use app\models\ContactForm;
use app\models\Countries;
use app\models\LoginForm;
use app\models\RegisterUser;
use app\models\Userinfo;
use app\models\Users;
use nodge\eauth\ErrorException;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\StringHelper;
use yii\web\Response;
use yii\web\User;
use yii\widgets\ActiveForm;

class SiteController extends AppController {

    public function behaviors() {

        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    public function actions() {
        
        return [
            'payment-type' => RegisterCompanyAction::className(),
        ];
    }


    public function actionRegisteruser() {

        if (!Yii::$app->user->isGuest) {

            return $this->goReferer();

        }

        $model = new RegisterUser();

        if (Yii::$app->request->isAjax AND $model->load(Yii::$app->request->post())) {

            $session = Yii::$app->session;

            if ($session->has('register_user')) {

                $session->remove('register_user');

            }

            Yii::$app->response->format = Response::FORMAT_JSON;

            if ($model->validate()) {

                $model->social_id = null;

                $session->set('register_user', serialize($model));

                return ['status' => 1];

            }

            return ActiveForm::validate($model);

        }

        return $this->goReferer();

    }

    public function actionRegisteruserinfo() {

        if (!Yii::$app->user->isGuest) {

            return $this->goReferer();

        }

        $model = new Userinfo();

        $mailer = new Mailer();

        $session = Yii::$app->session;

        if (Yii::$app->request->isAjax AND $model->load(Yii::$app->request->post())) {

            $model->city_id = 0;

            Yii::$app->response->format = Response::FORMAT_JSON;

            $cats = (!empty($model->cat_ids) AND is_array($model->cat_ids)) ? array_keys($model->cat_ids) : [];

            $model->category_ids = !empty($cats) ? implode(',', $cats) : '';

            if ($model->validate()) {

                $user = unserialize($session->get('register_user'));
                $session->remove('register_user');

                $new_user = new Users();
                $new_user->role_id = Users::ROLE_USER;
                $new_user->username = $user->login;
                $new_user->setPassword($user->password);
                $new_user->email = $user->email;
                $new_user->generatePasswordResetToken();
                $new_user->country_id = $model->country;
                $new_user->region_id = $model->region;
                if (!empty($user->social_id)) {
                    $new_user->status = $user->status;
                    $new_user->social_id = $user->social_id;
                    $new_user->social_name = $user->social_name;
                    $new_user->auth_key = $user->auth_key;
                } else {
                    $new_user->status = 0;
                }

                if ($new_user->save()) {

                    $model->user_id = $new_user->id;
                    if (!empty($user->social_id)) {
                        $model->social_url = $user->social_url;
                        $model->photo = $user->photo;
                        $model->sex = $user->sex;
                    }
                    $model->save();

                    $mailer->user_id = $model->id;
                    if((int)$model->info_offer == 1){
                        $mailer->user_group_id = Mailer::OFFER;
                        $mailer->user_type = Mailer::USER;
                    }else{
                        $mailer->user_group_id = Mailer::SUBSCRIBER;
                        $mailer->user_type = Mailer::USER;
                    }
                    $mailer->save();

                    $new_user->saveInterests(Yii::$app->request->post('Interests'));

                    if ($new_user->status == 1) {

                        Yii::$app->getUser()->login($new_user);

                    } else {

                        $new_user->sendToEmailPasswordResetToken();

                        Yii::$app->session->setFlash('nmessage', 'Request token has been sended to your email, check your email!');

                    }

                    return ['status' => 1, 'message' => 'Success'];


                }

                return ['status' => 0, 'message' => 'Fill please the first step again please'];

            }

            return ActiveForm::validate($model);

        }

        return $this->goReferer();

    }

    public function actionReset($token = null) {

        if (Yii::$app->user->isGuest) {

            if ($model = Users::findByPasswordResetToken($token)) {

                $model->status = 1;
                $model->password_reset_token = null;
                if($model->role_id == Users::ROLE_COMPANY){
                    $length = 10;
                    $chars = array_merge(range(0,9), range('a','z'), range('A','Z'));
                    shuffle($chars);
                    $password = implode(array_slice($chars, 0, $length));
                    $model->setPassword($password);
                }
                $model->save();
                if($model->role_id == Users::ROLE_COMPANY){
                    $model->sendLoginPassword($password);
                    Yii::$app->session->setFlash('nmessage', t('You have been authenticated successfully in the our system, have been sended login and password to your email'));

                }
                else{
                    Yii::$app->getUser()->login($model);

                    Yii::$app->session->setFlash('nmessage', 'You have been authenticated successfully in the our system');
                }
            }

        }

        $this->goHome();

    }

    public function actionConfirm($token = null)
    {
        if($model = PlacementRequests::findByPasswordResetToken($token)){
            $model->status = 1;
            $model->token = null;
            if($model->save()){
                Yii::$app->session->setFlash('nmessage', t('You have successfully verified the requests for the company'));
            }
        }
        $this->goHome();
    }

    public function actionLogin() {

        if (!Yii::$app->user->isGuest) {
            return $this->goReferer();
        }

        $model = new LoginForm();

        if (Yii::$app->request->isAjax AND $model->load(Yii::$app->request->post())) {

            Yii::$app->response->format = Response::FORMAT_JSON;

            if (!$model->login()) {

                return ActiveForm::validate($model);

            } else {

                $user = $model->getUser();

                $user->last_visit = date("Y-m-d H:i:s", strtotime('now'));

                $user->last_ip = Yii::$app->request->userIP;

                $user->update();

            }

        } else {

            $serviceName = Yii::$app->getRequest()->getQueryParam('service');

            if (isset($serviceName)) {

                $eauth = Yii::$app->get('eauth')->getIdentity($serviceName);

                $eauth->setRedirectUrl(Yii::$app->getUser()->getReturnUrl());

                $eauth->setCancelUrl(Yii::$app->getUrlManager()->createAbsoluteUrl('/'));

                try {

                    if ($eauth->authenticate()) {

                        $identity = Users::findByEAuth($eauth);

                        if (!is_null($identity)) {
                            if ($identity->status == 1) {
                                Yii::$app->getUser()->login($identity);

                                $eauth->redirect('/');
                            } else {
                                Yii::$app->getSession()->setFlash('error', 'Пользователь не активирован!');

                                $eauth->redirect($eauth->getCancelUrl());
                            }

                        } else {
                            Yii::$app->getSession()->setFlash('error', 'Пользователь не найден! Необходимо зарегистрироваться!');

                            $eauth->redirect($eauth->getCancelUrl());
                        }

                    } else {

                        $eauth->cancel();
                    }
                } catch (ErrorException $e) {

                    Yii::$app->getSession()->setFlash('error', 'EAuthException: ' . $e->getMessage());

                    $eauth->redirect($eauth->getCancelUrl());

                }

            }

        }

        return $this->goReferer();
    }

    public function actionSocialreg() {

        if (!Yii::$app->user->isGuest) {

            return $this->goReferer();

        }

        $session = Yii::$app->session;

        $serviceName = Yii::$app->getRequest()->getQueryParam('service');

        if (isset($serviceName)) {

            $eauth = Yii::$app->get('eauth')->getIdentity($serviceName);

            $eauth->setRedirectUrl(Yii::$app->getUser()->getReturnUrl());

            $eauth->setCancelUrl(Yii::$app->getUrlManager()->createAbsoluteUrl('/'));

            try {

                if ($eauth->authenticate()) {

                    if (!$eauth->getIsAuthenticated()) {
                         throw new ErrorException('EAuth user should be authenticated before creating identity.');
                    }

                    if ($user = Users::findByEAuth($eauth)) {

                        if (!is_array($user)) {
                            Yii::$app->getSession()->setFlash('error', 'E-mail - уже используется');
                            $this->redirect('/');
                            return false;
                        }

                        if ($user->status == 1) {
                            Yii::$app->getUser()->login($user);
                            $this->redirect('/');
                            return false;
                        } else {
                            Yii::$app->getSession()->setFlash('error', 'Пользователь не активирован!');
                            $this->redirect('/');
                            return false;
                        }

                    } else {

                        $model = new RegisterUser();

                        $model->loadFromSocial($eauth);

                        $session->set('register_user', serialize($model));
                        $session->set('UserSocialInfo', serialize($eauth->getAttributes()));

                        $this->redirect('/');
                    }

                }

            } catch (ErrorException $e) {

                Yii::$app->getSession()->setFlash('error', 'EAuthException: ' . $e->getMessage());
                $eauth->redirect($eauth->getCancelUrl());

            }

        }
        return false;
    }


    public function actionLogout() {

        Yii::$app->user->logout();

        return $this->goHome();

    }

    public function actionLanguage($lan) {

        if (isset(Yii::$app->params['languages'][$lan])) {

            Yii::$app->session->set('nlanguage', $lan);

            Yii::$app->language = $lan;

        }

        return $this->goReferer();

    }

    public function actionRegions($country_id = 0) {

        if (Yii::$app->request->isAjax) {

            if ($country = Countries::findOne($country_id)) {

                return $this->renderAjax('_user_regions', ['data' => $country->regions]);

            }

            return $this->renderAjax('_user_regions', ['data' => []]);

        }

        return $this->goReferer();

    }
    public function actionDirectionAuthor($direction_id) {

        if (Yii::$app->request->isAjax) {

            if ($company = CompanyInfo::find()->user()->employees()->one()) {
               $contact = $company->getContacts()->andWhere(['direction_id'=>$direction_id])->one();
               $employees =  $company->getEmployees()->andWhere(['direction_id'=>$direction_id])->all();
                return $this->renderAjax('_authors', ['data' => $employees,'company'=>$company,'contact'=>$contact]);

            }

            return $this->renderAjax('_authors', ['data' =>'','company'=>'','contact'=>'']);

        }

        return $this->goReferer();

    }

    public function actionCities($country_id = 0) {

        if (Yii::$app->request->isAjax) {

            if ($country = Regions::findOne($country_id)) {

                return $this->renderAjax('_user_regions', ['data' => $country->cities]);

            }

            return $this->renderAjax('_user_regions', ['data' => []]);

        }

        return $this->goReferer();

    }


    public function actionResetPass()
    {
        $model = new Users();

        if ($model->load(Yii::$app->request->post())) {

            $user = $model->findByEmail($model->email);

                if($user){
                    $user->generatePasswordResetToken();
                    if($user->save()){
                        $user->sendToEmailPasswordResetToken();
                        Yii::$app->getSession()->setFlash('nmessage', 'Request token has been sended to your email, check your email!');
                        $this->redirect('/');
                    }
                }else {
                    Yii::$app->getSession()->setFlash('error', 'Пользователь не найден, повторите попытку или зарегистрируйтесь!');
                    $this->redirect('/');
                }
        }
    }
    public function actionCompanySession(){

        $model = new RegisterCompanyForm();


        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {

            Yii::$app->response->format = Response::FORMAT_JSON;

            if ($model->validate()) {
                $session = Yii::$app->session;

                if ($session->has('register_company')) {
                    unset($_SESSION['register_company']);
                }
                $session['register_company'] = $model->attributes;
                return ['status' => 1];
            }
            return ActiveForm::validate($model);
        }
        return ['status' =>0];
    }

    public function actionPromo()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        if (Yii::$app->request->isAjax && Yii::$app->request->post()) {
            return ['success'=>true];
        }
        else
            return ['success'=>false];

    }
}
