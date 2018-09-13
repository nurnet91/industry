<?php

namespace app\controllers;

use app\actions\ManyToManyDeleteAjaxAction;
use app\actions\ManyToManyDeleteAjaxActionForCompanyProfile;
use app\actions\ManyToManyLinkAction;
use app\actions\ManyToManyResponseAction;
use app\actions\ManyToManyUpdateAction;
use app\actions\ManyToOneDeleteAjaxAction;
use app\components\AccessRule;
use app\components\AppController;
use app\models\ActivitySearch;
use app\models\Advertisement;
use app\models\CompanyProfileAboutDirectors;
use app\models\CompanyProfileCertificates;
use app\models\CompanyProfileChooses;
use app\models\CompanyProfileClients;
use app\models\CompanyProfileAbout;
use app\models\CompanyAds;
use app\models\CompanyProfileCapabilities;
use app\models\CompanyInfo;
use app\models\CompanyInfoFormIn;
use app\models\CompanyProfileTestimonials;
use app\models\Directions;
use app\models\CompanyProfileEmplContacts;
use app\models\CompanyProfileEmployees;
use app\models\FilterMain;
use app\models\FilterThemes;
use app\models\News;
use app\models\NewsForm;
use app\models\PlacementRequests;
use app\models\UserMessages;
use app\models\Users;
use app\models\VacancyForm;
use app\models\Webinars;
use Yii;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;


class CompanyController extends AppController
{
    public function behaviors() {

        return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => ['class' => AccessRule::className()],
                'rules' => [
                    [
                        'actions' => [
                            'validation',
                            'filters',
                            'index',
                            'activity',
                            'advertising',
                            'analytic',
                            'profile',
                            'tenders',
                            'empl-contacts-update',
                            'empl-contacts-edit',
                            'empl-contacts-response',
                            'empl-contacts-delete',
                            'webinars',
                            'edit-company-info',
                            'pass-change',
                            'delete-message',
                            'create-advertising',
                            'user-update',
                            'update-company-info',
                            'capability-edit',
                            'capability-response',
                            'capability-update',
                            'capability-delete',
                            'clients-edit',
                            'clients-response',
                            'clients-update',
                            'clients-delete',
                            'edit-choose',
                            'edit-certificates',
                            'certificates-delete',
                            'edit-employees',
                            'employee-response',
                            'employee-update',
                            'employee-delete',
                            'client-response',
                            'client-update',
                            'choose-response',
                            'choose-update',
                            'choose-delete',
                            'testimonials-edit',
                            'testimonials-response',
                            'testimonials-update',
                            'testimonials-delete',
                            'certificate-response',
                            'certificate-update',
                            'webinar-update',
                            'edit-webinars',
                            'test',
                            'create-vacancy',
                            'edit-vacancy',
                            'status-close',
                            'news-delete',
                            'about-edit',
                            'about-update',
                            'about-response',
                            'about-delete',
                            'about-director-response',
                            'about-director-update',
                            'about-directors-create',
                            'about-directors-delete',
                        ],
                        'allow' => true,
                        'roles' => [Users::ROLE_COMPANY],
                    ],
                ],

            ],
        ];

    }
    public function actions()
    {
        return [
            'clients-edit'=>[
              'class'=>ManyToManyLinkAction::className(),
              'modelClassName'=>CompanyProfileClients::className(),
              'relationName'=>'clients',
              ],
            'clients-response'=>[
                'class'=>ManyToManyResponseAction::className(),
                'modelClassName'=>CompanyProfileClients::className(),
            ],
            'clients-update'=>[
                'class'=>ManyToManyUpdateAction::className(),
                'modelClassName'=>CompanyProfileClients::className(),
                'formName'=>'CompanyProfileClients'
            ],
            'clients-delete'=>[
                'class'=>ManyToManyDeleteAjaxActionForCompanyProfile::className(),
                'modelClassName'=>CompanyProfileClients::className(),
                'relationName'=>'companiesClients'
            ],
            'edit-choose'=>[
                'class'=>ManyToManyLinkAction::className(),
                'modelClassName'=>CompanyProfileChooses::className(),
                'relationName'=>'chooses',
            ],
            'edit-webinars'=>[
                'class'=>ManyToManyLinkAction::className(),
                'modelClassName'=>Webinars::className(),
                'relationName'=>'webinars',
            ],
            'edit-certificates'=>[
                'class'=>ManyToManyLinkAction::className(),
                'modelClassName'=>CompanyProfileCertificates::className(),
                'relationName'=>'certificates',
            ],
            'certificates-delete'=>[
                'class'=>ManyToManyDeleteAjaxActionForCompanyProfile::className(),
                'modelClassName'=>CompanyProfileCertificates::className(),
                'relationName'=>'inCompaniesCertificates'
            ],
            'about-edit'=>[
                'class'=>ManyToManyLinkAction::className(),
                'modelClassName'=>CompanyProfileAbout::className(),
                'relationName'=>'about',
            ],
            'edit-employees'=>[
                'class'=>ManyToManyLinkAction::className(),
                'modelClassName'=>CompanyProfileEmployees::className(),
                'relationName'=>'employees',
            ],
            'employee-response'=>[
                'class'=>ManyToManyResponseAction::className(),
                'modelClassName'=>CompanyProfileEmployees::className(),
            ],
            'employee-update'=>[
                'class'=>ManyToManyUpdateAction::className(),
                'modelClassName'=>CompanyProfileEmployees::className(),
                'formName'=>'CompanyProfileEmployees'
            ],
            'employee-delete'=>[
                'class'=>ManyToManyDeleteAjaxActionForCompanyProfile::className(),
                'modelClassName'=>CompanyProfileEmployees::className(),
                'relationName'=>'companiesEmployees'
            ],
            'capability-edit'=>[
                'class'=>ManyToManyLinkAction::className(),
                'modelClassName'=>CompanyProfileCapabilities::className(),
                'relationName'=>'capabilities',
            ],
            'capability-response'=>[
                'class'=>ManyToManyResponseAction::className(),
                'modelClassName'=>CompanyProfileCapabilities::className(),
            ],
            'capability-update'=>[
                'class'=>ManyToManyUpdateAction::className(),
                'modelClassName'=>CompanyProfileCapabilities::className(),
                'formName'=>'CompanyProfileCapabilities'
            ],
            'capability-delete'=>[
                'class'=>ManyToManyDeleteAjaxActionForCompanyProfile::className(),
                'modelClassName'=>CompanyProfileCapabilities::className(),
                'relationName' => 'companiesCapability',
            ],
            'about-update'=>[
                'class'=>ManyToManyUpdateAction::className(),
                'modelClassName'=>CompanyProfileAbout::className(),
                'formName'=>'CompanyProfileAbout'
            ],
            'about-director-update'=>[
                'class'=>ManyToManyUpdateAction::className(),
                'modelClassName'=>CompanyProfileAboutDirectors::className(),
                'formName'=>'CompanyProfileAboutDirectors'
            ],
            'certificate-response'=>[
                'class'=>ManyToManyResponseAction::className(),
                'modelClassName'=>CompanyProfileCertificates::className(),
            ],
            'choose-response'=>[
                'class'=>ManyToManyResponseAction::className(),
                'modelClassName'=>CompanyProfileChooses::className(),
            ],
            'choose-delete'=>[
                'class'=>ManyToManyDeleteAjaxActionForCompanyProfile::className(),
                'modelClassName'=>CompanyProfileChooses::className(),
                'relationName' => 'inCompaniesChooses',
            ],
            'testimonials-edit'=>[
                'class'=>ManyToManyLinkAction::className(),
                'modelClassName'=>CompanyProfileTestimonials::className(),
                'relationName'=>'testimonials',
            ],
            'testimonials-response'=>[
                'class'=>ManyToManyResponseAction::className(),
                'modelClassName'=>CompanyProfileTestimonials::className(),
            ],
            'testimonials-update'=>[
                'class'=>ManyToManyUpdateAction::className(),
                'modelClassName'=>CompanyProfileTestimonials::className(),
                'formName'=>'CompanyProfileTestimonials'
            ],
            'testimonials-delete'=>[
                'class'=>ManyToManyDeleteAjaxActionForCompanyProfile::className(),
                'modelClassName'=>CompanyProfileTestimonials::className(),
                'relationName'=>'companiesTestimonials'
            ],
            'empl-contacts-edit'=>[
                'class'=>ManyToManyLinkAction::className(),
                'modelClassName'=>CompanyProfileEmplContacts::className(),
                'relationName'=>'contacts',
            ],

            'empl-contacts-response'=>[
                'class'=>ManyToManyResponseAction::className(),
                'modelClassName'=>CompanyProfileEmplContacts::className(),
            ],
            'empl-contacts-update'=>[
                'class'=>ManyToManyUpdateAction::className(),
                'modelClassName'=>CompanyProfileEmplContacts::className(),
                'formName'=>'CompanyProfileEmplContacts'
            ],
            'empl-contacts-delete'=>[
                'class'=>ManyToManyDeleteAjaxActionForCompanyProfile::className(),
                'modelClassName'=>CompanyProfileEmplContacts::className(),
                'relationName' => 'companiesEmplContacts',
            ],
            'about-response'=>[
                'class'=>ManyToManyResponseAction::className(),
                'modelClassName'=>CompanyProfileAbout::className(),
            ],
            'about-director-response'=>[
                'class'=>ManyToManyResponseAction::className(),
                'modelClassName'=>CompanyProfileAboutDirectors::className(),
            ],
            'about-delete'=>[
                'class'=>ManyToManyDeleteAjaxActionForCompanyProfile::className(),
                'modelClassName'=>CompanyProfileAbout::className(),
                'relationName'=>'companiesAbout'
            ],
            'choose-update'=>[
                'class'=>ManyToManyUpdateAction::className(),
                'modelClassName'=>CompanyProfileChooses::className(),
                'formName'=>'CompanyProfileChooses'
            ],
            'certificate-update'=>[
                'class'=>ManyToManyUpdateAction::className(),
                'modelClassName'=>CompanyProfileCertificates::className(),
                'formName'=>'CompanyProfileCertificates'
            ],
            'webinar-update'=>[
                'class'=>ManyToManyUpdateAction::className(),
                'modelClassName'=>Webinars::className(),
                'formName'=>'Webinars'
            ],
            'status-close'=>[
                'class'=>ManyToOneDeleteAjaxAction::className(),
                'modelClassName'=>CompanyAds::className(),
                'request'=>'id',
                'findAttribute'=>'id',
            ],
            'status-request-close'=>[
                'class'=>ManyToManyDeleteAjaxAction::className(),
                'modelClassName'=>PlacementRequests::className(),
                'relationName' => 'users',
                'relationClassName' => Yii::$app->user->identity,
                'findAttribute'=>'id',
            ],
            'news-delete'=>[
                'class'=>ManyToOneDeleteAjaxAction::className(),
                'modelClassName'=>News::className(),
                'request'=>'id',
                'findAttribute'=>'id',
            ]

        ];
    }

    public function actionValidation($class){
        $model = new $class;
        $post = Yii::$app->request->post();
        if(Yii::$app->request->isAjax && $model->load($post)){
            Yii::$app->response->format = 'json';
            $model->scenario = $model->action;

            return ActiveForm::validate($model);
        }
        return false;
    }

    public function actionFilters($ids = null, $model = '', $modelMain = 0)
    {
        if ($modelMain > 0) {
            $modelMain = FilterMain::findOne($modelMain);
        }
        $arr = [];
        if (Yii::$app->request->isAjax) {
            $lan = Yii::$app->language;
            if ($model == 'directions') {
                if ($filter = Directions::findOne($ids)) {
                    return $this->renderAjax('_filter_form', ['data' => $filter->subs, 'item_id' => $modelMain->theme_id, 'mName' => 'theme', 'attrLabel' => $filter->getAttributeLabel('name_'.$lan)]);
                }
            }
            if ($model == 'sub_themes') {
                if(count(explode(',', $ids)) > 1){
                    foreach (explode(',', $ids) as $key => $id){
                        if ($filter = FilterThemes::findOne($id)) {
                            if(count($filter->subsEquipment)){
                                foreach ($filter->subsEquipment as $key2 => $value) {
                                    array_push($arr, $value);
                                }
                            }
                        }
                    }
                    if(!empty($arr)){
                        return $this->renderAjax('_filter_form', ['data' => $arr, 'item_id' => $modelMain->sub_theme_id, 'mName' => 'subTheme', 'attrLabel' => $filter->getAttributeLabel('name_'.$lan)]);
                    }else{
                        return false;
                    }
                }else{
                    if ($filter = FilterThemes::findOne($ids)) {
                        if(count($filter->subsEquipment)){
                            return $this->renderAjax('_filter_form', ['data' => $filter->subsEquipment, 'item_id' => $modelMain->sub_theme_id, 'mName' => 'subTheme', 'attrLabel' => $filter->getAttributeLabel('name_'.$lan)]);
                        }
                    }
                }
            }

            return false;

        }

        return $this->redirect(!empty(Yii::$app->request->referrer) ? Yii::$app->request->referrer : '/');

    }

    public function actionIndex()
    {
        $company = $this->findCompany();

        $view =  $this->render('index',['model'=>$company]);

        if (!empty($company->messages)) {
            foreach ($company->messages as $key => $value) {

                if ($value->readed == 0) {

                    $value->readed = 1;

                    $value->update();
                }

            }
        }
        return $view;
    }

    public function actionAboutDirectorsCreate()
    {
        $CompanyAboutDirectors = new CompanyProfileAboutDirectors();

        if($CompanyAboutDirectors->load(Yii::$app->request->post()) && $CompanyAboutDirectors->save())
        {
            $this->redirect(Yii::$app->request->referrer ? Yii::$app->request->referrer : '/company/profile');
        }
    }

    public function actionAboutDirectorsDelete()
    {
        $CompanyAboutDirectors = CompanyProfileAboutDirectors::findOne(Yii::$app->request->post('id'));

        if($CompanyAboutDirectors->delete())
        {
            $this->redirect(Yii::$app->request->referrer ? Yii::$app->request->referrer : '/company/profile');
        }
    }

    public function actionActivity()
    {
        //TODO НАДО ПОПРАВИТ КАРТИНКИ НА ФРОНТ ЕНДЕ ОНИ ВЫВОДЯТСА НЕ КРУТО
        $searchModel = new ActivitySearch();
        $news_sale = News::find()->type(News::SALE_ADVERTISEMENT)->user()->sortDesc()->likes()->comments()->limit(15)->all();
        $news_company = News::find()->type(News::COMPANY_NEWS_RU)->user()->sortDesc()->likes()->comments()->limit(15)->all();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,Yii::$app->request->get('sort'));
        $mainCats = Directions::findForMainList();
        $mainTypes = \app\models\NewsTypes::findForMainList();
        $requestForm = new NewsForm();
        return $this->render('activity', [
            'news_sale'=>$news_sale,
            'news_company'=>$news_company,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'mainCats'=>$mainCats,
            'mainTypes'=>$mainTypes,
            'request'=>$requestForm,
        ]);
    }

    public function actionAdvertising()
    {

        $model = CompanyInfo::find()->advertisement()->user()->one();
        $advertisement = new Advertisement();
        return $this->render('advertising',['model'=>$model,'advertisement'=>$advertisement]);
    }

    public function actionCreateAdvertising(){
        $model = new Advertisement();
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            if($model->save()){
                Yii::$app->session->setFlash('nmessage', t('Order request successfully sent'));
            }
        }
        return $this->redirect('/company/advertising');
    }

    public function actionAnalytic()
    {
        //TODO НАДО ПОПРАВИТ КЛИКИ
            $model = CompanyInfo::find()->user()->requests()->favorites()->newsCompany()->newsSale()->ads()->one();
            return $this->render('analytic',['model'=>$model]);
    }

    public function actionProfile()
    {
        //TODO нАДО ПОПРАВИТ ВАЛИДАТЦИЮ НА ВАРИАНТИ КОМПАНИИ
        $model =  Users::find()->joinCompany()->company()->self()->one();
        $directions = Directions::find()->orderBy('position')->all();

        return $this->render('profile',compact('model', 'directions'));
    }

    public function actionTenders()
    {
            $model = CompanyInfo::find()->user()->requests()->one();
            return $this->render('tenders',['model'=>$model]);
    }

    public function actionWebinars()
    {
        $model =  Users::find()->webinars()->company()->self()->one();
        return $this->render('webinars',compact('model'));
    }
    public function findCompany(){
        return Users::find()->joinCompany()->company()->self()->one();
    }

    public function actionEditCompanyInfo()
    {
        if (!Yii::$app->user->isGuest) {
            $userId = Yii::$app->user->getId();
        }
        $validate = new CompanyInfoFormIn();
        if($validate->load(Yii::$app->request->post(), 'CompanyInfoForm')){
            if(!empty($validate->email)){
                $user = Users::findOne(['id' => $userId]);
                $user->setAttributes($validate->attributes);
                $user->save(false);
            }
            $userInfo = CompanyInfo::findOne(['user_id' => $userId]);
            $userInfo->setAttributes($validate->attributes);
            if($userInfo->save()) {
                Yii::$app->session->setFlash('nmessage', t('Data successfully updated'));
            }
        }
        return $this->goReferer();
    }

    public function actionUpdateCompanyInfo(){
        if (!Yii::$app->user->isGuest) {
            $userId = Yii::$app->user->getId();
        }
        $companyInfo = CompanyInfo::findOne(['user_id' => $userId]);

        if($companyInfo->load(Yii::$app->request->post())){
            if($companyInfo->save()){
                Yii::$app->session->setFlash('nmessage', t('Data successfully updated'));
            }
        }
        return $this->goReferer();
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
    public function actionDeleteMessage($id) {

        if ($model = UserMessages::find()->where(['user_id' => Yii::$app->user->identity->id, 'id' => $id])->one()) {
            if($model->delete()){
                Yii::$app->session->setFlash('nmessage', t('message successfully delete'));
            }
        }

        return $this->goReferer();

    }
    public function actionUserUpdate(){
        $model = Users::findOne(Yii::$app->user->id);
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            if($model->save()) {
                Yii::$app->session->setFlash('nmessage', t('Data successfully updated'));
            }
        }
        return $this->goReferer();
    }

    public function actionEditVacancy(){
        $model = new CompanyAds();
        $form = new VacancyForm();
        if ($form->load(Yii::$app->request->post()))
        {
            $form->validate();
            $form->dataFile  = UploadedFile::getInstances($form, 'dataFile');
            $form->imageFile = UploadedFile::getInstance($form,'imageFile');
            $model->setAttributes($form->attributes);
            $model->type_id = CompanyAds::Vacancies;
            $model->save();
            return $this->goReferer();
        }
        return $this->goReferer();
    }

    
}