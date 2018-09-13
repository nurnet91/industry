<?php

namespace app\models;

use app\components\UploadBehavior;
use app\models\queries\DirectionQuery;
use Yii;
use app\components\TimeBehavior;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
 * This is the model class for table "in_filter_directions".
 *
 * @property int $id
 * @property string $name_ru
 * @property string $name_en
 * @property string $name_ua
 * @property string $created_at
 * @property string $updated_at
 * @property string $status
 * @property string $position
 */

class Directions extends \yii\db\ActiveRecord {

    public static function tableName() {

        return 'in_filter_directions';

    }
    public $_analytic;

    public $imageFile;

    public function behaviors() {

        return [
            [
                'class' => TimeBehavior::className(),
            ],
            [
                'class' => UploadBehavior::className(),
                'imageFile' => 'imageFile',
                'photo' => 'photo',
                'path' => 'uploads/directions',
            ],
        ];
        
    }

    public function rules() {

        return [
            [['name_ru', 'name_en', 'name_ua'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['status', 'position', 'on_main'], 'integer'],
            [['name_ru', 'name_en', 'name_ua', 'photo'], 'string', 'max' => 250],
            [['description_ru', 'description_en', 'description_ua'], 'string'],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'on' => 'create'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'on' => 'update'],
        ];
        
    }

    public function getName(){

        $lan = Yii::$app->language;

        $txt = 'name_'.$lan;

        return $this->$txt;
    }

    public function getDescription(){

        $lan = Yii::$app->language;

        $txt = 'description_'.$lan;

        return $this->$txt;
    }

    public function findByLang() {

        $lan = Yii::$app->language;

        return self::find()->select('id, name_'.$lan);

    }

    public static function allList(){

        $list = self::findByLang()->all();

        return ArrayHelper::map($list, 'id', 'name');

    }

    public function attributeLabels() {

        return [
            'id' => 'ID',
            'name_ru' => 'Направление',
            'name_en' => 'Direction En',
            'name_ua' => 'Direction Ua',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];

    }
    public static  function findForMainOne($id){
        $lan = Yii::$app->language;
        return ArrayHelper::map(self::find()->where(['status'=>1])->andWhere(['id'=>$id])->limit(1)->all(), 'id', 'name_'.$lan);

    }
    public static function findForMainList() {
        $lan = Yii::$app->language;

        return ArrayHelper::map(self::find()->where(['status'=>1])->all(), 'id', 'name_'.$lan);

    }

    public function getSubsService(){
        return $this->hasMany(FilterMain::className(), ['direction_id' => 'id'])->select('direction_id, theme_id')->andOnCondition(['type' => FilterMain::TYPE_SERVICE])->joinWith('theme')->groupBy('direction_id, theme_id' );
    }

    public function getSubsEquipment(){
        return $this->hasMany(FilterMain::className(), ['direction_id' => 'id'])->select('direction_id, theme_id')->andOnCondition(['type' => FilterMain::TYPE_EQUIPMENT])->joinWith('theme')->groupBy('direction_id, theme_id');
    }

    public function getSubs() {
        return $this->hasMany(FilterMain::className(), ['direction_id' => 'id'])->select('direction_id, theme_id, type')->joinWith('theme')->groupBy('direction_id, theme_id, type')->orderBy('position');
    }

    public function getNewsCompanyru(){
        return $this->hasMany(News::className(),['category_id'=>'id'])->from(['company-news-ru'=>'in_news'])->onCondition(['company-news-ru.status'=>News::STATUS_ACTIVE])->andOnCondition(['company-news-ru.type_id'=>News::COMPANY_NEWS_RU])->orderBy(['company-news-ru.id'=>SORT_DESC])->limit(4);
    }
    public function getNewsCompanyen(){
        return $this->hasMany(News::className(),['category_id'=>'id'])->from(['company-news-en'=>'in_news'])->onCondition(['company-news-en.status'=>News::STATUS_ACTIVE])->andOnCondition(['company-news-en.type_id'=>News::COMPANY_NEWS_EN])->orderBy(['company-news-en.id'=>SORT_DESC])->limit(4);
    }
    public function getNewsEvents(){
        return $this->hasMany(News::className(),['category_id'=>'id'])->from(['event-news'=>'in_news'])->onCondition(['event-news.status'=>News::STATUS_ACTIVE])->andOnCondition(['event-news.type_id'=>News::NEWS_EVENTS])->orderBy(['event-news.id'=>SORT_DESC])->limit(4);
    }
    public function getNewsArticle(){
        return $this->hasMany(News::className(),['category_id'=>'id'])->from(['article-news'=>'in_news'])->onCondition(['article-news.status'=>News::STATUS_ACTIVE])->andOnCondition(['article-news.type_id'=>News::NEWS_ARTICLE])->orderBy(['article-news.id'=>SORT_DESC])->limit(4);
    }
    public function getNewsAnalytic(){
        return $this->hasMany(News::className(),['category_id'=>'id'])->from(['analytic-news'=>'in_news'])->onCondition(['analytic-news.status'=>News::STATUS_ACTIVE])->andOnCondition(['analytic-news.type_id'=>News::NEWS_ANALYTIC])->orderBy(['analytic-news.id'=>SORT_DESC])->limit(4);
    }
    public function getNewsSale(){
        return $this->hasMany(News::className(),['category_id'=>'id'])->from(['sale-news'=>'in_news'])->onCondition(['sale-news.status'=>News::STATUS_ACTIVE])->andOnCondition(['sale-news.type_id'=>News::SALE_ADVERTISEMENT])->orderBy(['sale-news.id'=>SORT_DESC])->limit(4);
    }
    public function getNewsReports(){
        return $this->hasMany(News::className(),['category_id'=>'id'])->from(['reports-news'=>'in_news'])->onCondition(['reports-news.status'=>News::STATUS_ACTIVE])->andOnCondition(['reports-news.type_id'=>News::NEWS_REPORTS])->orderBy(['reports-news.id'=>SORT_DESC])->limit(4);
    }
    public function getNewsVideos(){
        return $this->hasMany(News::className(),['category_id'=>'id'])->from(['videos-news'=>'in_news'])->onCondition(['videos-news.status'=>News::STATUS_ACTIVE])->andOnCondition(['videos-news.type_id'=>News::NEWS_VIDEO])->orderBy(['videos-news.id'=>SORT_DESC])->limit(4);
    }
    public function getNewsPresentations(){
        return $this->hasMany(News::className(),['category_id'=>'id'])->from(['presentations-news'=>'in_news'])->onCondition(['presentations-news.status'=>News::STATUS_ACTIVE])->andOnCondition(['presentations-news.type_id'=>News::NEWS_Presentations])->orderBy(['presentations-news.id'=>SORT_DESC])->limit(4);
    }
    public function getNewsPhoto(){
        return $this->hasMany(News::className(),['category_id'=>'id'])->from(['photo-news'=>'in_news'])->onCondition(['photo-news.status'=>News::STATUS_ACTIVE])->andOnCondition(['photo-news.type_id'=>News::NEWS_PHOTO])->orderBy(['photo-news.id'=>SORT_DESC])->limit(4);
    }
    public function getNewsPopular(){
        return $this->hasMany(News::className(),['category_id'=>'id'])->from(['popular-news'=>'in_news'])->onCondition(['popular-news.status'=>News::STATUS_ACTIVE]);
    }
    public function getNewsDiscussed(){
        return $this->hasMany(News::className(),['category_id'=>'id'])->from(['discussed-news'=>'in_news'])->onCondition(['discussed-news.status'=>News::STATUS_ACTIVE]);
    }
    public function getNewsBd(){
        return $this->hasMany(News::className(),['category_id'=>'id'])->from(['bd-news'=>'in_news'])->onCondition(['bd-news.status'=>News::STATUS_ACTIVE])->andOnCondition(['bd-news.type_id'=>News::NEWS_BD])->orderBy(['bd-news.id'=>SORT_DESC])->limit(4);
    }
    public function getNewsMain(){
        return $this->hasMany(News::className(),['category_id'=>'id'])->from(['main-news'=>'in_news'])->onCondition(['main-news.status'=>News::STATUS_ACTIVE])->andOnCondition(['main-news.type_id'=>News::NEWS_MAIN])->orderBy(['main-news.id'=>SORT_DESC])->limit(4);
    }
    public function getNewsMainByDate(){
        return $this->hasMany(News::className(),['category_id'=>'id'])->from(['main-news'=>'in_news'])->onCondition(['main-news.status'=>News::STATUS_ACTIVE])->andOnCondition(['main-news.type_id'=>News::NEWS_MAIN])->orderBy(['main-news.id'=>SORT_DESC])->limit(4)->andOnCondition(['between','main-news.created_at','MONTH(DATE_ADD(NOW(), INTERVAL -1 MONTH))',"2018-07-23 17:17:28"]);
    }
    public function getNewsPhotoByDate(){
        return $this->hasMany(News::className(),['category_id'=>'id'])->from(['photo-news'=>'in_news'])->onCondition(['photo-news.status'=>News::STATUS_ACTIVE])->andOnCondition(['photo-news.type_id'=>News::NEWS_PHOTO])->orderBy(['photo-news.id'=>SORT_DESC])->limit(4)->andOnCondition(['between','photo-news.created_at','MONTH(DATE_ADD(NOW(), INTERVAL -1 MONTH))',"2018-07-23 17:17:28"]);
    }
    public function getNewsPresentationsByDate(){
        return $this->hasMany(News::className(),['category_id'=>'id'])->from(['presentations-news'=>'in_news'])->onCondition(['presentations-news.status'=>News::STATUS_ACTIVE])->andOnCondition(['presentations-news.type_id'=>News::NEWS_Presentations])->orderBy(['presentations-news.id'=>SORT_DESC])->limit(4)->andOnCondition(['between','presentations-news.created_at','MONTH(DATE_ADD(NOW(), INTERVAL -1 MONTH))',"2018-07-23 17:17:28"]);
    }
    public function getNewsReportsByDate(){
        return $this->hasMany(News::className(),['category_id'=>'id'])->from(['reports-news'=>'in_news'])->onCondition(['reports-news.status'=>News::STATUS_ACTIVE])->andOnCondition(['reports-news.type_id'=>News::NEWS_REPORTS])->orderBy(['reports-news.id'=>SORT_DESC])->limit(4)->andOnCondition(['between','reports-news.created_at','MONTH(DATE_ADD(NOW(), INTERVAL -1 MONTH))',"2018-07-23 17:17:28"]);
    }
    public function getNewsVideosByDate(){
        return $this->hasMany(News::className(),['category_id'=>'id'])->from(['videos-news'=>'in_news'])->onCondition(['videos-news.status'=>News::STATUS_ACTIVE])->andOnCondition(['videos-news.type_id'=>News::NEWS_VIDEO])->orderBy(['videos-news.id'=>SORT_DESC])->limit(4)->andOnCondition(['between','videos-news.created_at','MONTH(DATE_ADD(NOW(), INTERVAL -1 MONTH))',"2018-07-23 17:17:28"]);
    }
    public function getNewsArticleByDate(){
        return $this->hasMany(News::className(),['category_id'=>'id'])->from(['article-news'=>'in_news'])->onCondition(['article-news.status'=>News::STATUS_ACTIVE])->andOnCondition(['article-news.type_id'=>News::NEWS_ARTICLE])->orderBy(['article-news.id'=>SORT_DESC])->limit(4)->andOnCondition(['between','article-news.created_at','MONTH(DATE_ADD(NOW(), INTERVAL -1 MONTH))',"2018-07-23 17:17:28"]);
    }
    public function getNewsAnalyticByDate(){
        return $this->hasMany(News::className(),['category_id'=>'id'])->from(['analytic-news'=>'in_news'])->onCondition(['analytic-news.status'=>News::STATUS_ACTIVE])->andOnCondition(['analytic-news.type_id'=>News::NEWS_ANALYTIC])->orderBy(['analytic-news.id'=>SORT_DESC])->limit(4)->andOnCondition(['between','analytic-news.created_at','MONTH(DATE_ADD(NOW(), INTERVAL -1 MONTH))',"2018-07-23 17:17:28"]);
    }
    public function getNewsSaleByDate(){
        return $this->hasMany(News::className(),['category_id'=>'id'])->from(['sale-news'=>'in_news'])->onCondition(['sale-news.status'=>News::STATUS_ACTIVE])->andOnCondition(['sale-news.type_id'=>News::SALE_ADVERTISEMENT])->orderBy(['sale-news.id'=>SORT_DESC])->limit(4)->andOnCondition(['between','sale-news.created_at','MONTH(DATE_ADD(NOW(), INTERVAL -1 MONTH))',"2018-07-23 17:17:28"]);
    }
    public function getNewsWebinars(){
        return $this->hasMany(News::className(),['category_id'=>'id'])->from(['webinars-news'=>'in_news'])->onCondition(['webinars-news.status'=>News::STATUS_ACTIVE])->andOnCondition(['webinars-news.type_id'=>News::NEWS_WEBINARS])->orderBy(['webinars-news.id'=>SORT_DESC])->limit(4);
    }
    public function getNewsConference(){
        return $this->hasMany(News::className(),['category_id'=>'id'])->from(['conference-news'=>'in_news'])->onCondition(['conference-news.status'=>News::STATUS_ACTIVE])->andOnCondition(['conference-news.type_id'=>News::NEWS_WEBINARS])->orderBy(['conference-news.id'=>SORT_DESC])->limit(4);
    }
    public function getNewsRF(){
        return $this->hasMany(News::className(),['category_id'=>'id'])->from(['rf-news'=>'in_news'])->onCondition(['rf-news.status'=>News::STATUS_ACTIVE])->andOnCondition(['rf-news.type_id'=>News::NEWS_WEBINARS])->orderBy(['rf-news.id'=>SORT_DESC])->limit(4);
    }
    public function getNewsEnRF(){
        return $this->hasMany(News::className(),['category_id'=>'id'])->from(['en-rf-news'=>'in_news'])->onCondition(['en-rf-news.status'=>News::STATUS_ACTIVE])->andOnCondition(['en-rf-news.type_id'=>News::NEWS_EN_RF])->orderBy(['en-rf-news.id'=>SORT_DESC])->limit(4);
    }

    public static function find()
    {
        return new DirectionQuery(get_called_class());
    }
    public function getSingleLink(){
        return Url::to(['/main/news-direction','id'=>$this->id]);
    }

}
