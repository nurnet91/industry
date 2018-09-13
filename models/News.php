<?php

namespace app\models;

use app\components\TimeBehavior;
use app\components\UploadBehavior;
use app\models\queries\NewsQuery;
use Yii;
use yii\helpers\Url;
use yii\web\User;

/**
 * This is the model class for table "in_news".
 *
 * @property int $id
 * @property int $category_id
 * @property string $photo
 * @property int $user_id
 * @property int $type_id
 * @property string $title_ru
 * @property string $title_en
 * @property string $title_ua
 * @property string $text_ru
 * @property string $text_en
 * @property string $text_ua
 * @property string $link
 * @property string $created_at
 * @property string $updated_at
 * @property int $status
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $imageFile;
    const STATUS_ACTIVE = 1;
    const COMPANY_NEWS_RU = 2;
    const SALE_ADVERTISEMENT = 7;
    const COMPANY_NEWS_EN = 3;
    const NEWS_EVENTS = 4;
    const NEWS_ARTICLE = 5;
    const NEWS_ANALYTIC = 6;
    const NEWS_REPORTS = 8;
    const NEWS_VIDEO = 9;
    const NEWS_Presentations =10;
    const NEWS_PHOTO = 11;
    const NEWS_MAIN = 1;
    const NEWS_POPULAR = 14;
    const NEWS_TESTIMONIALS = 13;
    const NEWS_BD = 12;
    const NEWS_WEBINARS = 15;
    const NEWS_SEMINARS_CONFERENCE = 16;
    const NEWS_RF = 17;
    const NEWS_EN_RF = 18;
    public $authors_list;
    public $newPhoto;
    public static function tableName()
    {
        return 'in_news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'title_ru', 'title_en', 'title_ua'], 'required'],
            [['category_id', 'user_id','views','type_id', 'status'], 'integer'],
//            [['anotation_ru','anotation_en','anotation_ua','author'],'string'],
            [['category_id','type_id'],'required'],
            [['user_id'],'default','value' => Yii::$app->user->id],
            [['text_ru', 'text_en', 'text_ua'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['photo', 'title_ru', 'title_en', 'title_ua', 'link'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'on' => 'create'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'on' => 'update'],
            [['newPhoto'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'on' => 'create'],
            [['newPhoto'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'on' => 'update'],
        ];
    }
    public function behaviors() {

        return [
            [
                'class' => TimeBehavior::className(),
            ],
            [
                'class' => UploadBehavior::className(),
                'imageFile' => 'imageFile',
                'photo' => 'photo',
                'path' => 'uploads/news',
            ],
            [
                'class' => UploadBehavior::className(),
                'imageFile' => 'newPhoto',
                'photo' => 'photo',
                'path' => 'uploads/news',
                'uploadedFileFunction' => false
            ],

        ];

    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'photo' => 'Photo',
            'user_id' => 'User ID',
            'type_id' => 'Type ID',
            'title_ru' => 'Title Ru',
            'title_en' => 'Title En',
            'title_ua' => 'Title Ua',
            'text_ru' => 'Text Ru',
            'text_en' => 'Text En',
            'text_ua' => 'Text Ua',
            'link' => 'Link',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
            'author'=>'Author',
            'anotation_ru' => 'Text Ru',
            'anotation_en' => 'Text En',
            'anotation_ua' => 'Text Ua',
        ];
    }
    public static function find()
    {
        return new NewsQuery(get_called_class());
    }
    public function getTypes(){
        return $this->hasOne(NewsTypes::className(),['id'=>'type_id']);
    }
    public function getTitle(){
        $lan = Yii::$app->language;

        $txt = 'title_'.$lan;

        return $this->$txt;
    }
    public function getText(){
        $lan = Yii::$app->language;

        $txt = 'text_'.$lan;

        return $this->$txt;
    }
    public function getCompany(){
        return $this->hasOne(CompanyInfo::className(),['user_id'=>'user_id']);
    }
    public function getUserTitle(){
        return $this->title;
    }
    public function getUserText(){
        return $this->text;
    }
    public function getUser(){
        return $this->hasOne(Users::className(),['id'=>'user_id']);
    }
    public function getDate(){
        return Yii::$app->formatter->asDate($this->created_at,'d/M/yy');
    }
    public function getPhotos(){
        if(!isset($this->photo)){
          return noPhotoSrc();
        }
        if(!empty($this->photo)){
            return '/'.$this->photo;
        }else{
            return noPhotoSrc();
        }
    }
    public function getComments(){
        return $this->hasMany(Comments::className(),['id'=>'comment_id'])->via('newsComments');
    }
    public function getLikes(){
        return $this->hasMany(Users::className(),['id'=>'user_id'])->from(['like_news_users'=>'in_users'])->via('newsLikes');
    }
    public function getNewsComments()
    {
        return $this->hasMany(NewsComments::className(), ['new_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNewsLikes()
    {
        return $this->hasMany(NewsLikes::className(), ['new_id' => 'id']);
    }
    public function getCountLikes(){
        $count =  count($this->likes);
        if(empty($count)){
            $count = '0';
        }
        return $count;
    }
    public function getCountComments(){
        $count =  count($this->comments);
        if(empty($count)){
            $count = '0';
        }
        return $count;
    }
    public function getView(){
        if($this->views == null){
            return '0';
        }
        else $this->views;
    }

    public static function Types(){
     return[
         self::COMPANY_NEWS_RU => t('Новости российских компаний'),
         self:: SALE_ADVERTISEMENT => t('Акции'),
         self:: COMPANY_NEWS_EN => t('Новости зарубежных компаний'),
         self:: NEWS_EVENTS => t('События'),
         self:: NEWS_ARTICLE => t('Статьи'),
         self:: NEWS_ANALYTIC => t('Аналитика'),
         self:: NEWS_REPORTS => t('Репортажи, интервью'),
         self:: NEWS_VIDEO => t('Видео'),
         self:: NEWS_Presentations => t('Презентации'),
         self:: NEWS_PHOTO => t('Фото'),
        ];
    }

    public function getAnotation(){
        $lan = Yii::$app->language;

        $txt = 'anotation_'.$lan;

        return $this->$txt;
    }
    public function getDefaultTitle(){
        return $this->title_ru;
    }
    public function getDefaultText(){
        return $this->text_ru;
    }
    public function getEventsDate(){
        return Yii::$app->formatter->asDate($this->created_at,'d/M/yy','h:m');
    }
    public function getEventsMap(){
        return $this->text_ru;
    }
    public static function TypesEvents(){
        return[
            t('Главные новости'),
            t('События'),
            t('Новости российских компаний'),
            t('Новости зарубежных компаний'),
            t('Репортажи, интервью'),
            t('Самые популярные'),
            t('Самые обсуждаемые'),
            t('Новоев Базе Знаний'),
            t('Акции')

        ];
    }

    public static function TypeEventPage(){
        return[
            t('Главные события'),
            t('Выставки в РФ'),
            t('Зарубежные выставки'),
            t('Семинары и конференции'),
            t('Вебинары'),
            t('Самое популярное'),
            t('Самые обсуждаемое'),
        ];
    }
    public function findTypeIndex(){

    }
    public function TypesAll(){
       return [
         self::COMPANY_NEWS_RU => t('Новости российских компаний'),
         self:: SALE_ADVERTISEMENT => t('Акции'),
         self:: COMPANY_NEWS_EN => t('Новости зарубежных компаний'),
         self:: NEWS_EVENTS => t('События'),
         self:: NEWS_ARTICLE => t('Статьи'),
         self:: NEWS_ANALYTIC => t('Аналитика'),
         self:: NEWS_REPORTS => t('Репортажи, интервью'),
         self:: NEWS_VIDEO => t('Видео'),
         self:: NEWS_Presentations => t('Презентации'),
         self:: NEWS_PHOTO => t('Фото'),
         self:: NEWS_BD => t('Новоев Базе Знаний'),
         self:: NEWS_MAIN => t('Главные новости'),
         self::NEWS_RF =>  t('Выставки в РФ'),
         self::NEWS_EN_RF =>   t('Зарубежные выставки'),
         self::NEWS_SEMINARS_CONFERENCE =>  t('Семинары и конференции'),
         self::NEWS_WEBINARS =>  t('Вебинары'),
        ];
    }
    public function getSingleLink(){
        return Url::to(['/main/news-inside','id'=>$this->id]);
    }
    public function getDirection(){
        return $this->hasOne(Directions::className(),['id'=>'category_id']);
    }

    public static function Type($type)
    {
        switch ($type) {
            case self:: COMPANY_NEWS_RU:
               return t('Новости российских компаний');
                break;
            case self:: SALE_ADVERTISEMENT :
                return t('Акции');
                break;
            case self:: COMPANY_NEWS_EN :
                return t('Новости зарубежных компаний');
                break;
            case self:: NEWS_EVENTS :
                return  t('События');
                break;
            case self:: NEWS_ARTICLE :
                return t('Статьи');
                break;
            case self:: NEWS_ANALYTIC :
                return  t('Аналитика');
                break;
            case  self:: NEWS_REPORTS :
                return t('Репортажи, интервью');
                break;
            case self:: NEWS_VIDEO :
                return  t('Видео');
                break;
            case  self:: NEWS_Presentations :
                return  t('Презентации');
                break;
            case  self:: NEWS_PHOTO :
                return  t('Фото');
                break;
            case  self:: NEWS_BD :
                return t('Новоев Базе Знаний');
                break;
            case self:: NEWS_MAIN :
                return  t('Главные новости');
                break;
        }
    }
    public static function industryTypes(){
       return  NewsTypes::find()->where(['in','id',[self::NEWS_MAIN,self::NEWS_ARTICLE,self::NEWS_ANALYTIC,self::SALE_ADVERTISEMENT,self::NEWS_REPORTS,self::NEWS_VIDEO,self::NEWS_Presentations,self::NEWS_PHOTO]])->all();
    }
}
