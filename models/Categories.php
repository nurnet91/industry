<?php

namespace app\models;

use app\models\queries\CategoryQuery;
use Yii;
use app\components\TimeBehavior;
use app\components\UploadBehavior;
use yii\helpers\ArrayHelper;

class Categories extends \yii\db\ActiveRecord {

    public $imageFile;

    public static function tableName() {

        return 'in_categories';

    }

    public function behaviors() {

        return [
            [
                'class' => TimeBehavior::className(),
            ],
            [
                'class' => UploadBehavior::className(),
                'imageFile' => 'imageFile',
                'photo' => 'img',
                'path' => 'uploads/categories',
            ],

        ];
        
    }

    public function rules() {
        return [
            [['name_ru', 'name_en', 'name_ua'], 'required'],
            [['parent_id', 'status', 'on_menu', 'on_footer', 'footer_position', 'is_direction'], 'integer'],
            [['name_ru', 'name_en', 'name_ua', 'description_ru','description_en','description_ua', 'img', 'link'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'on' => 'create'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'on' => 'update'],
            [['created_at', 'updated_at', 'news_count'], 'safe'],
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'name_ru' => t('Name Ru'),
            'name_en' => t('Name En'),
            'name_ua' => t('Name Ua'),
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'description_ru' => t('Description Ru'),
            'description_en' => t('Description En'),
            'description_eu' => t('Description Ua'),
            'img' => t('Image'),
            'on_menu' => t('Show on menu'),
            'on_footer' => t('Show on footer'),
            'footer_position' => t('Footer position'),
            'link' => t('Link'),
            'is_direction' => 'Direction'
        ];
    }

//    public static function findForMain() {
//
//        $lan = Yii::$app->language;
//
//        return self::find()->select(['id', 'name_'. $lan, 'description_'.$lan, 'img'])->where(['on_main' => 1, 'status' => 1]);
//
//    }

    public static function findForMainList() {

        return ArrayHelper::map(Directions::find()->where(['on_main' => 1, 'status' => 1])->orderBy('position')->all(), 'id', 'name');

    }

    public static function findByLan() {

        $lan = Yii::$app->language;

        return self::find()->select(['id', 'name_'. $lan])->where(['status' => 1]);
        
    }

    public static function allList() {

        $categories = self::findByLan()->all();

        return ArrayHelper::map($categories, 'id', 'name');

    }

    public function getName() {

        $lan = Yii::$app->language;

        $txt = 'name_'.$lan;

        return $this->$txt;

    }
    public function getDescription() {

        $lan = Yii::$app->language;

        $txt = 'description_'.$lan;

        return $this->$txt;

    }

    public function getNews() {

        return $this->hasMany(News::className(), ['category_id' => 'id']);

    }

    public function getChilds() {

        return $this->hasMany(self::className(), ['parent_id' => 'id'])->andOnCondition(['status' => 1, 'on_menu'=> 1]);

    }

    public function getSubs() {

        return $this->hasMany(self::className(), ['parent_id' => 'id'])->andOnCondition(['status'=> 1]);

    }

    public function getSubs2() {

        $lan = Yii::$app->language;
        return ArrayHelper::map($this->subs, 'id', 'name_' . $lan);

    }

    public function getSubscribers() {
        
        return $this->hasMany(self::className(), ['parent_id' => 'id'])->andOnCondition(['status' => 1, 'on_subscribers'=> 1]);
        
    }

    public static function sortData($cats, $parent_id) {

        $items = [];

        if (!empty($cats)) {

            foreach ($cats as $key => $value) {

                if ($value->parent_id == $parent_id) {
                    
                    $items[] = ['model' => $value, 'childs' => self::sortData($cats, $value->id)];

                }
                
            }
            
        }

        return $items;
        
    }

    public static function menuList() {

        $cats = self::find()->joinWith('news')->where(['in_categories.status' => 1, 'in_categories.on_menu' => 1])->orderBy(['in_categories.parent_id' => SORT_ASC])->all();

        $res = self::sortData($cats, 0);

        return $res;
    }

    public function getParent() {

        return $this->hasOne(self::className(), ['id' => 'parent_id']);

    }

    public function getNewsCompanyru(){
        return $this->hasOne(News::className(),['category_id'=>'id'])->from(['company-news-ru'=>'in_news'])->onCondition(['company-news-ru.status'=>News::STATUS_ACTIVE])->andOnCondition(['company-news-ru.type_id'=>News::COMPANY_NEWS_RU])->orderBy(['company-news-ru.id'=>SORT_DESC]);
    }
    public function getNewsCompanyen(){
        return $this->hasOne(News::className(),['category_id'=>'id'])->from(['company-news-en'=>'in_news'])->onCondition(['company-news-en.status'=>News::STATUS_ACTIVE])->andOnCondition(['company-news-en.type_id'=>News::COMPANY_NEWS_EN])->orderBy(['company-news-en.id'=>SORT_DESC]);
    }
    public function getNewsEvents(){
        return $this->hasMany(News::className(),['category_id'=>'id'])->from(['event-news'=>'in_news'])->onCondition(['event-news.status'=>News::STATUS_ACTIVE])->andOnCondition(['event-news.type_id'=>News::NEWS_EVENTS])->orderBy(['event-news.id'=>SORT_DESC])->limit(2);
    }
    public function getNewsArticle(){
        return $this->hasOne(News::className(),['category_id'=>'id'])->from(['article-news'=>'in_news'])->onCondition(['article-news.status'=>News::STATUS_ACTIVE])->andOnCondition(['article-news.type_id'=>News::NEWS_ARTICLE])->orderBy(['article-news.id'=>SORT_DESC]);
    }
    public function getNewsAnalytic(){
        return $this->hasOne(News::className(),['category_id'=>'id'])->from(['analytic-news'=>'in_news'])->onCondition(['analytic-news.status'=>News::STATUS_ACTIVE])->andOnCondition(['analytic-news.type_id'=>News::NEWS_ANALYTIC])->orderBy(['analytic-news.id'=>SORT_DESC]);
    }
    public function getNewsSale(){
        return $this->hasOne(News::className(),['category_id'=>'id'])->from(['sale-news'=>'in_news'])->onCondition(['sale-news.status'=>News::STATUS_ACTIVE])->andOnCondition(['sale-news.type_id'=>News::SALE_ADVERTISEMENT])->orderBy(['sale-news.id'=>SORT_DESC]);
    }
    public function getNewsReports(){
        return $this->hasOne(News::className(),['category_id'=>'id'])->from(['reports-news'=>'in_news'])->onCondition(['reports-news.status'=>News::STATUS_ACTIVE])->andOnCondition(['reports-news.type_id'=>News::NEWS_REPORTS])->orderBy(['reports-news.id'=>SORT_DESC]);
    }
    public function getNewsVideos(){
        return $this->hasOne(News::className(),['category_id'=>'id'])->from(['videos-news'=>'in_news'])->onCondition(['videos-news.status'=>News::STATUS_ACTIVE])->andOnCondition(['videos-news.type_id'=>News::NEWS_VIDEO])->orderBy(['videos-news.id'=>SORT_DESC]);

    }
    public function getNewsPresentations(){
        return $this->hasOne(News::className(),['category_id'=>'id'])->from(['presentations-news'=>'in_news'])->onCondition(['presentations-news.status'=>News::STATUS_ACTIVE])->andOnCondition(['presentations-news.type_id'=>News::NEWS_Presentations])->orderBy(['presentations-news.id'=>SORT_DESC]);
    }
    public function getNewsPhoto(){
        return $this->hasOne(News::className(),['category_id'=>'id'])->from(['photo-news'=>'in_news'])->onCondition(['photo-news.status'=>News::STATUS_ACTIVE])->andOnCondition(['photo-news.type_id'=>News::NEWS_PHOTO])->orderBy(['photo-news.id'=>SORT_DESC]);
    }
    public static function find()
    {
        return new CategoryQuery(get_called_class());
    }


}
