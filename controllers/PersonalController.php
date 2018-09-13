<?php

namespace app\controllers;

use app\models\FilterEquipmentTypes;
use app\models\FilterMain;
use app\models\FilterOperations;
use app\models\FilterSubThemes;
use app\models\FilterTechnologies;
use app\models\FilterThemes;
use Yii;
use app\components\AccessRule;
use app\components\AppController;
use app\models\Categories;
use app\models\Countries;
use app\models\Directions;
use app\models\Regions;
use app\models\UserMessages;
use app\models\Userinfo;
use app\models\Users;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\web\User;

class PersonalController extends AppController {

    public function behaviors() {

        return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => ['class' => AccessRule::className()],
                'rules' => [
                    [
                        'actions' => ['index', 'pass-change', 'edit-user-info', 'interests', 'settings', 'activity', 'tenders', 'publish', 'delete-message', 'filter'],
                        'allow' => true,
                        'roles' => [Users::ROLE_USER, Users::ROLE_ADMIN],
                    ],
                ],
            ]
        ];

    }

    public function actionIndex() {

        $user = Yii::$app->user->identity;
        $countries = Countries::selectList();
        $regions = Regions::findByCountry($user->country->id);

        $view = $this->render('index', compact('user', 'countries', 'regions'));

        if (!empty($user->messages)) {

            foreach ($user->messages as $key => $value) {

                if ($value->readed == 0) {

                    $value->readed = 1;

                    $value->update();
                    
                }
                
            }
            
        }

        return $view;

    }

    public function actionPassChange() {
        
        if(Yii::$app->request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            $data = Yii::$app->request->post();
            $newPass = $data['newpassword'];
            if($newPass == null){
                return ['status' => 0];
            }

            $userId = Yii::$app->user->getId();

            $user = Users::findOne($userId);

            $user->setPassword($newPass);
            $user->generatePasswordResetToken();

                if($user->save()){
                    return ['status' => 1];
                };
            }
        return false;
    }

    public function actionEditUserInfo() {

        $user = Yii::$app->user->identity;

        $userInfo = $user->info;

        if($userInfo->load(Yii::$app->request->post())){

            $userInfo->imageFile = UploadedFile::getInstance($userInfo, 'imageFile');

            if($userInfo->validate()){

                $user->city_id = 0;

                $user->country_id = $userInfo->country;

                $user->region_id = $userInfo->region;

                if ($userInfo->imageFile) {

                    $userInfo->upload();

                    $userInfo->imageFile = null;
                }

                if ($user->save() AND $userInfo->save()) {

                    return $this->redirect('/personal');
                    
                } else {

                    dd($user->errors);
                    dd($userInfo->errors);
                    
                }

            }
            else{
                dd($userInfo->errors);
            }

        }

    }

    public function actionDeleteMessage($id) {

        if ($model = UserMessages::find()->where(['user_id' => Yii::$app->user->identity->id, 'id' => $id])->one()) {

            $model->delete();
            
        }

        return $this->redirect('/personal');
        
    }

    public function actionInterests() {

        return $this->render('interests');

    }

    public function actionSettings() {

        $model = new FilterMain();

        $directions = Directions::find()->all();
        $directionsList = Directions::allList();
        $themesList = FilterThemes::allList();

//        dd($directions);
//        ddv($directionsList);
//        dd($themesList);

        $languages = Yii::$app->params['languages'];

        return $this->render('settings', compact('directions', 'languages', 'model', 'directionsList', 'themesList'));
        
    }

    public function actionActivity() {

        return $this->render('activity');

    }

    public function actionTenders() {

        return $this->render('tenders');

    }

    public function actionPublish() {

        return $this->render('publish');

    }

    public function actionFilter($id = 0, $model = '') {

        if (Yii::$app->request->isAjax) {

            if ($model == 'directions_all'){
                if($filter = Directions::findOne($id)) {
                    return $this->renderAjax('_filter_form', ['data' => $filter->subs]);
                }
            }

            if ($model == 'directions_s'){
                if($filter = Directions::findOne($id)) {
                    return $this->renderAjax('_filter_form', ['data' => $filter->subsService]);
                }
            }

            if ($model == 'directions_e'){
                if($filter = Directions::findOne($id)) {
//                    dd($filter->subsEquipment);
                    return $this->renderAjax('_filter_form', ['data' => $filter->subsEquipment]);
                }
            }

            if ($model == 'direction_themes'){

                if($filter = FilterThemes::findOne($id)) {
                    return $this->renderAjax('_filter_form',['data' => $filter->subsService]);
                }
            }

            if ($model == 'direction_themes_sub'){
                if($filter = FilterThemes::findOne($id)) {
                    return $this->renderAjax('_filter_form', ['data' => $filter->subsEquipment]);
                }
            }

            if ($model == 'theme_tech'){
                if($filter = FilterTechnologies::findOne($id)) {
                    return $this->renderAjax('_filter_form', ['data' => $filter->subs]);
                }
            }

            if ($model == 'sub_themes'){
                if($filter = FilterSubThemes::findOne($id)) {
                    return $this->renderAjax('_filter_form', ['data' => $filter->subs]);
                }
            }

            if ($model == 'tech_operations_s'){
                if($filter = FilterOperations::findOne($id)) {
                    return $this->renderAjax('_filter_form', ['data' => $filter->subsService]);
                }
            }

            if ($model == 'tech_operations_e'){
                if($filter = FilterOperations::findOne($id)) {
                    return $this->renderAjax('_filter_form', ['data' => $filter->subsEquipment]);
                }
            }

            if ($model == 'equipment_type'){
                if($filter = FilterEquipmentTypes::findOne($id)) {
                    return $this->renderAjax('_filter_form', ['data' => $filter->subs]);
                }
            }

            return $this->renderAjax('_filter_form', ['data' => []]);

        }

//        return $this->redirect(!empty(Yii::$app->request->referrer) ? Yii::$app->request->referrer : '/');

    }

    protected function findModel($id)
    {
        if (($modelFiltersForm = FilterMain::findOne($id)) !== null) {
            return $modelFiltersForm;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
