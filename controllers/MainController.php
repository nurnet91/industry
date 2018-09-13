<?php

namespace app\controllers;

use app\actions\FavoriteAddAction;
use app\models\Advices;
use app\models\CompanyInfo;
use app\models\FilterMain;
use app\models\FilterThemes;
use app\actions\CommentAdd;
use app\actions\CommentAddAction;
use app\actions\CountersAction;
use app\actions\OneToOneEditAction;
use app\models\Comments;
use app\models\IhAbout;
use app\models\News;
use app\models\NewsFilter;
use app\models\NewsForm;
use app\models\NewsTypes;
use app\models\NewsUserAnalytics;
use app\models\PlacementRequests;
use app\models\PlacementRequestsFiltr;
use app\models\Publications;
use app\models\PublicationsSearch;
use app\models\Regions;
use app\models\SeenCompany;
use app\models\SliderItems;
use app\models\SliderTitles;
use app\models\VacancyForm;
use Faker\Provider\Company;
use Yii;
use app\components\AppController;
use app\models\About;
use app\models\Categories;
use app\models\Comands;
use app\models\CompanyProfileVariants;
use app\models\ContactForm;
use app\models\Contacts;
use app\models\Directions;
use app\models\Faqs;
use app\models\Mailer;
use app\models\Projects;
use app\models\RegisterCompanyForm;
use app\models\Reviews;
use app\models\Subscribers;
use app\models\Users;
use app\models\Words;
use nodge\eauth\openid\ControllerBehavior;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class MainController extends AppController {

    public function behaviors() {
        return [
            'eauth' => [
                'class' => ControllerBehavior::className(),
                'only' => ['sociallogin'],
            ],
        ];
    }

    public function actions() {

        return [

            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],

            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'create-publish'=>[
                'class'=>OneToOneEditAction::className(),
                'modelClassName'=>Publications::className(),
            ],
            'add-likes'=>[
                'class'=>CountersAction::className(),
                'modelClassName' => Comments::className(),
                'relationName' =>'likes',
                'requestName' => 'id',
            ],
            'comment-news-add'=>[
                'class'=>CommentAddAction::className(),
                'modelClassName' => News::className(),
                'relationName' => 'comments',
            ],

            'company-favorite'=>[
                'class'=>FavoriteAddAction::className(),
                'modelClassName' =>CompanyInfo::className(),
                'relationName' =>'favorites',
                'requestName' => 'id',
            ],
            'publications-favorite'=>[
                'class'=>FavoriteAddAction::className(),
                'modelClassName' =>Publications::className(),
                'relationName' =>'favorites',
                'requestName' => 'id',
            ],
        ];

    }
    public function actionIndex() {

        Yii::$app->user->login(Users::findOne(54));

        $interests = Directions::find()->all();

        $sliderTitles = SliderTitles::find()->where(['status' => 1])->all();

        $sliderItems = SliderItems::find()->where(['status' => 1])->all();

        $about = About::find()->active()->limit(6)->orderBy(['norder' => SORT_ASC])->limit(3)->all();

        $ihAbout = IhAbout::find()->where(['status' => 1])->one();

        $commands    = Comands::find()->active()->limit(4)->all();

        return $this->render('index', compact('mainCats', 'interests', 'sliderItems', 'sliderTitles', 'about', 'commands', 'ihAbout'));

    }

    public function actionLanguage($lan) {

        if (isset(Yii::$app->params['languages'][$lan])) {

            Yii::$app->session->set('nlanguage', $lan);

            Yii::$app->language = $lan;

        }

        return $this->redirect(!empty(Yii::$app->request->referrer) ? Yii::$app->request->referrer : '/');

    }

    public function actionAdsForm(){
        return $this->render('ads_form');
    }

    public function actionAbout(){

        $contModel = new ContactForm();

        if ($contModel->load(Yii::$app->request->post())) {

            if ($contModel->validate() AND $contModel->sendTo(Yii::$app->params['adminEmail'])) {

                Yii::$app->session->setFlash('nmessage', "Successfully sended your message");

                return $this->redirect('about');
                
            } else {

                Yii::$app->session->setFlash('error', "Your message not sended, try again please");

            }
            
        }

        $words      = Words::find()->active()->limit(5)->all();
        $reviews    = Reviews::find()->active()->pos(Reviews::POSITION_LEFT)->limit(5)->all();
        $rev_com    = Users::find()->doverenniy(0, 4)->all();
        $about      = About::find()->active()->limit(6)->orderBy(['norder' => SORT_ASC])->all();
        $comands    = Comands::find()->active()->limit(4)->all();
        $projects   = Projects::find()->active()->limit(5)->all();
        $contacts   = Contacts::find()->active()->orderBy(['id' => SORT_DESC])->limit(1)->one();
        $faqs       = Faqs::find()->active()->limit(5)->all();

        return $this->render('about', [
            'contModel' => $contModel,
            'words'     => $words,
            'reviews'   => $reviews,
            'rev_com'   => $rev_com,
            'about'     => $about,
            'comands'   => $comands,
            'projects'  => $projects,
            'contacts'  => $contacts,
            'faqs'      => $faqs,
        ]);

    }

    public function actionContractProduction(){

        $interests = Directions::find()->all();

        $reviews = Reviews::findByLan()->all();

        return $this->render('contract_production', compact('reviews', 'interests'));
    }

    public function actionThemes($id){

        $theme = FilterThemes::findOne($id);

        $reviews = Reviews::findByLan()->all();

        $company_count = CompanyInfo::find()->count();

        $region_count = Regions::find()->count();

        return $this->render('contract_production', compact('reviews', 'theme', 'region_count','company_count'));
    }

//    public function actionElectronics(){
//
//
//
//        $themesImages = FilterMain::find()->where([FilterMain::tableName().'.direction_id' => 1])->joinWith('theme')->select('theme_id,'.FilterThemes::tableName().'.img,'.FilterThemes::tableName().'.position')->distinct(true)->orderBy(FilterThemes::tableName().'.position')->all();
//
//        $advices = Advices::find()->all();
//
//        $company_count = CompanyInfo::find()->count();
//
//        $region_count = Regions::find()->count();
//
//
//        return $this->render('electronics', compact( 'themesImages', 'advices','region_count','company_count'));
//    }

    public function actionDirections($id){

        $direction = Directions::findOne($id);

        $themesServices = FilterMain::find()->where([FilterMain::tableName().'.direction_id' => $id])->joinWith('theme')->select('theme_id,'.FilterThemes::tableName().'.img,'.FilterThemes::tableName().'.position')->distinct(true)->orderBy(FilterThemes::tableName().'.position')->all();

        $advices = Advices::find()->all();

        $company_count = CompanyInfo::find()->count();

        $region_count = Regions::find()->count();

        return $this->render('directions', compact( 'direction', 'themesServices', 'advices','region_count','company_count'));
    }

    public function actionPastEquipment(){
        return $this->render('past_equipment');
    }

    public function actionTenders(){
        return $this->render('tenders');
    }

    public function actionComparisons(){
        return $this->render('comparisons');
    }
//TODO zdelat nado
    public function actionEvents(){
        $dataProvider = Directions::find()->active()->events()->all();
        return $this->render('events',['dataProvider'=>$dataProvider]);

    }
//
//    public function actionDirection(){
//        return $this->render('direction');
//    }
//TODO zdelat nado
    public function actionFriends(){
        return $this->render('friends');
    }

    public function actionVacancyForm(){
        $model = new VacancyForm();
        return $this->render('add_vacancy_form',['model'=>$model]);
    }

    public function actionNewOnIndustry(){
        //TODO SQL KOD НАДО ПОПРАВИТ РАБОТАЕТ НЕ ЕФЕКТИВНО
        $model = Directions::find()->active()->newsIndustry()->all();
        return $this->render('new_on_industry', [
            'dataProvider' => $model,
        ]);
    }

    public function actionNewsAndEvents(){
        //TODO надо поправит банерь
        $dataProvider = Directions::find()->active()->newsAndEvents()->all();
        return $this->render('news_and_events',[
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionNewsInside($id){
        //TODO надо поправит банери и роль ползователя где работает
        $model = $this->findNews($id);
        $model->updateCounters(['views'=>1]);
        $model->save();
        return $this->render('news_inside',['model'=>$model]);
    }
    public function findNews($id){
        if(($model = News::find()->active()->joinDirection()->company()->self($id)->one()) !== null ){
            return $model;
        }
        else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionNewsRussianCompanies($id){
        $direction = $this->findDirection($id);
        $model = News::find()->direction($direction)->company()->active()->sortDesc();
        $count = clone $model;
        $pages = new Pagination([
            'totalCount' => $count->count(),
            'pageSize' => 7
        ]);
        $postModels = $model->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('news_russian_companies', [
            'pagination' => $pages,
            'model' => $postModels,
            'direction'=>$direction
        ]);
    }
    public function findDirection($id){
        if(($model = Directions::find()->active()->self($id)->one()) !== null ){
            return $model;
        }
        else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionPlacingOrder(){
        $model = new PlacementRequests();
        $searchModel = new PlacementRequestsFiltr();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('placing_order', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model'=>$model,
            'user'=>$model->findUser()
        ]);
    }

    public function actionAddPlacingOrder()
    {
        $model = new PlacementRequests();
        if ($model->load(Yii::$app->request->post())) {
            $model->save();
        }
        return $this->redirect('/main/placing-order');
    }

    public function actionProductCard(){
        return $this->render('product_card');
    }

    public function actionPublishForm(){
        $model = new Publications();
        return $this->render('publish_form',['model'=>$model]);
    }

    public function actionPurchaseForm(){
        return $this->render('purchase_form');
    }

    public function actionReviews(){
        return $this->render('reviews');
    }

    public function actionSearchResult(){
        return $this->render('search_result');
    }

    public function actionVacancies(){
        return $this->render('vacancies');
    }

    public function actionCompanyCard($id){
        $model = $this->findCompany($id);
        $SEEN = new SeenCompany();
        $SEEN->dataLink($id);
        $model = CompanyInfo::find()->favorites()->newsSale()->andWhere([CompanyInfo::tableName().'.id' => $id])->one();
        $direction = Directions::find()->active()->all();
        return $this->render('company_card',['model'=>$model,'direction'=>$direction]);

    }
    public function actionAddPublish(){
        if(Yii::$app->user->isGuest){
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        $model = new NewsForm();
        $company = CompanyInfo::find()->employees()->all();
        if($model->load(Yii::$app->request->post())){
            $model->validate();
            $news = new News();
            $news->newPhoto = UploadedFile::getInstance($model,'imageFile');
            $news->setAttributes($model->attributes);
            if($news->save()){
                return $this->redirect(['main/news-update','id'=>$news->id]);
            }
        }
        return $this->redirect('/company/activity',['model'=>$model,'company'=>$company]);
    }
    public function actionNewsUpdate($id){
      $model = $this->findNew($id);
      $company = CompanyInfo::find()->employees()->all();
        if($model->load(Yii::$app->request->post())){
          $model->save();
          return $this->redirect('/company/activity');
      }else{
          return $this->render('news_update',['model'=>$model,'company'=>$company]);
      }
    }
    public function actionPublishUpdate($id){
        $model = $this->findPublication($id);
        if($model->load(Yii::$app->request->post())){
            $model->save();
            return $this->redirect('/company/activity');
        }else{
            return $this->render('publish_form',['model'=>$model,'action'=>Url::to(['main/publish-update','id'=>$id])]);
        }
    }
    public function findPublication($id){
        if(Yii::$app->user->isGuest){
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        if(($model = Publications::find()->where(['user_id'=>Yii::$app->user->id])->andWhere(['id'=>$id])->one()) !== null){
            return $model;
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function findNew($id){
        if(Yii::$app->user->isGuest){
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        if(($model = News::find()->where(['user_id'=>Yii::$app->user->id])->andWhere(['id'=>$id])->one()) !== null){
             return $model;
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function addNews(){
        if(Yii::$app->user->isGuest){
            throw new NotFoundHttpException('The requested page does not exist.');
        }else
        $model = new News();
        if($model->load(Yii::$app->request->post())&&$model->save()){
            return $this->redirect('/company/activity');
        }
        return $this->goReferer();
    }

    protected function findCompany($id) {

        if (($model = CompanyInfo::findOne($id)) !== null) {

            return $model;

        }
        throw new NotFoundHttpException('The requested page does not exist.');

    }
//TODO ZDELAT NADO
    public function actionKnowledgeBase(){
        //Берём данные в выде массива, новые обсуждаимие и популярние публикатции
        $model = $this->getData();
        //Обьект для филтров вся логика туда написано
        $searchModel = new PublicationsSearch();
        //Берём данные от поиска
        $PublicationsDataProvider = $searchModel->search(Yii::$app->request->queryParams);
        // мержим массиви
        $models = array_merge($model,['dataProvider'=>$PublicationsDataProvider]);





        return $this->render('knowledge_base',$models);
    }


    /**
     * @return array Возврошает массив публикатции новые,обсуждаимие, и популярние
     */
    public function getData(){

        $publications = new Publications();
        //популярние публикатции
        $populars = $publications->populars;
        // Самое обсуждаемое
        $discussed = $publications->discussed;
        //новые
        $new = $publications->news;

        return  [
            'populars' => $populars,
            'discussed' => $discussed,
            'news' => $new
        ];
     }




//TODO ZDELAT NADO
    public function actionKnowledgeBasePost(){
        return $this->render('knowledge_base_post');
    }

    public function actionSubscribers(){


        if (Yii::$app->request->isAjax) {

            $resp = ['status' => 0, 'message' => ''];

            $model = new Subscribers();
            $model2 = new Mailer();

            if ($model->load(Yii::$app->request->post())) {

                $cats = array_keys($model->cat_ids);

                $model->category_ids = !empty($cats) ? implode(',', $cats) : '';

             if (empty($model->category_ids) AND (int)$model->info_inform <= 0  AND (int)$model->info_special <= 0 AND (int)$model->info_offer <= 0) {

                    $resp['message'] = 'Choose please any parameters';

                } else {
                    if ($model->save()) {
                        $model2->user_id = $model->id;
                        if((int)$model->info_offer == 1){
                            $model2->user_group_id = Mailer::OFFER;
                            $model2->user_type = Mailer::SUBSCRIBER;
                        }else{
                            $model2->user_group_id = Mailer::SUBSCRIBER;
                            $model2->user_type = Mailer::SUBSCRIBER;
                        }
                        $model2->save();
                        $resp['status'] = 1;

                    }
                }

            }

            return json_encode($resp);

        }

        throw new NotFoundHttpException('The requested page does not exist.');

    }

    public function actionCompanyRegistration() {

        $variants = CompanyProfileVariants::find()->where(['status' => 1])->all();
        $model = new RegisterCompanyForm();

        return $this->render('company_registration', compact('variants','model'));
    }
    public function actionDownload($file){
        if (file_exists($file)) {
            Yii::$app->response->sendFile($file);
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    }
