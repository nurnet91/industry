<?php

namespace app\models;

use app\components\UploadBehavior;
use phpDocumentor\Reflection\Types\Self_;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

class CompanyInfo extends \yii\db\ActiveRecord
{

    const TYPE_INDIVIDUAL = 1;
    const TYPE_ENTITIY = 2;
    const COMPANY_TYPE_MAX = 3;
    const COMPANY_TYPE_BUSINESS = 2;
    const COMPANY_TYPE_STANDART = 1;
    public static $types = [
        1 => 'TYPE_INDIVIDUAL',
        2 => 'TYPE_ENTITIY',
    ];

    const PAYMENT_ONLINE = 1;
    const PAYMENT_BANKS = 2;
    public static $payments = [
        1 => 'PAYMENT_ONLINE',
        2 => 'PAYMENT_BANKS',
    ];

    public $imageFile;

    public static function tableName() {

        return 'in_company_info';

    }

    public function behaviors() {

        return [

            [
                'class' => UploadBehavior::className(),
                'imageFile' => 'imageFile',
                'photo' => 'photo',
                'path' => 'uploads/companyinfo',
            ],

        ];
    }

    public function rules()
    {

        return [
            [['first_name', 'last_name', 'name', 'inn', 'phone'], 'required'],
            [['user_id', 'promo_code', 'type', 'payment_type', 'company_variant_id'], 'integer'],
            [['comment'], 'string'],
            [['first_name', 'last_name', 'middle_name', 'name', 'inn', 'technical_info_number', 'technical_info_email', 'cooperation_info_fio', 'cooperation_info_number', 'cooperation_info_email', 'photo', 'technical_info_fio'], 'string', 'max' => 250],
            [['phone'], 'string', 'max' => 50],
            [['annotation'], 'safe'],
            [['created_at', 'updated_at'], 'safe'],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'on' => 'create'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'on' => 'update']
        ];

    }

    public function attributeLabels()
    {

        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'middle_name' => 'Middle Name',
            'name' => 'Name',
            'inn' => 'Inn',
            'phone' => 'Phone',
            'comment' => 'Comment',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'promo_code' => 'Promo Code',
            'type' => 'Type',
            'payment_type' => 'Payment Type',
            'company_variant_id' => 'Company Variant ID',
            'technical_info_fio' => 'Technical Info Fio',
            'technical_info_number' => 'Technical Info Number',
            'technical_info_email' => 'Technical Info Email',
            'cooperation_info_fio' => 'Cooperation Info Fio',
            'cooperation_info_number' => 'Cooperation Info Number',
            'cooperation_info_email' => 'Cooperation Info Email',
            'photo' => 'Photo',
            'annotation' => 'Annotation',
            'imageFile'=>t('Load photo'),
        ];

    }

    public function getUser()
    {

        return $this->hasOne(Users::className(), ['id' => 'user_id']);

    }

    public function __toString() {

        return $this->last_name.' '.$this->first_name.' '.$this->middle_name;   // TODO: Implement __toString() method.

    }

    public function getCooperationInfoNumber(){

        if(!empty($this->cooperation_info_number)){

            return '+'.$this->cooperation_info_number;

        }else{

            return t('Не задано');

        }

    }

    public function getCooperationInfoEmail(){

        if(!empty($this->cooperation_info_email)){

            return $this->cooperation_info_email;

        }else{
            return t('Не задано');

        }

    }

    public function getCooperationInfoFio(){

        if(!empty($this->cooperation_info_number)){

            return $this->cooperation_info_number;

        }else{

            return t('Не задано');

        }

    }

    public function getTechnicalInfoNumber(){

        if(!empty($this->technical_info_number)){

            return '+'.$this->technical_info_number;

        }else{

            return t('Не задано');

        }

    }

    public function getTechnicalInfoEmail(){

        if(!empty($this->technical_info_email)){

            return '+'.$this->technical_info_email;

        }else{

            return t('Не задано');

        }

    }

    public function getTechnicalInfoFio(){

        if(!empty($this->technical_info_fio)){

            return '+'.$this->technical_info_fio;

        }else{

            return t('Не задано');

        }

    }

    public static function find() {

        return new CompanyInfoQuery(get_called_class());

    }

    public function getAdvertisement(){

        return $this->hasMany(Advertisement::className(),['user_id'=>'user_id']);

    }

    public function getAbout() {

        return $this->hasMany(CompanyProfileAbout::className(), ['id' => 'about_id'])->via('companiesAbout');
    }

    public function getCompaniesAbout() {

        return $this->hasMany(CompaniesAbout::className(), ['company_id' => 'user_id']);
    }

    public function getEmployees() {

        return $this->hasMany(CompanyProfileEmployees::className(), ['id' => 'employee_id'])->via('companiesEmployees');

    }

    public function getContacts() {

        return $this->hasMany(CompanyProfileEmplContacts::className(), ['id' => 'contact_id'])->via('companyContacts');

    }

    public function getCapabilities() {

        return $this->hasMany(CompanyProfileCapabilities::className(), ['id' => 'capability_id'])->via('companiesCapabilities');

    }

    public function getChooses() {

        return $this->hasMany(CompanyProfileChooses::className(), ['id' => 'choose_id'])->via('companiesChooses');
    }

    public function getCertificates() {

        return $this->hasMany(CompanyProfileCertificates::className(), ['id' => 'certificate_id'])->via('companiesCertificates');
    }

    public function getCompaniesClients() {

        return $this->hasMany(CompaniesClients::className(), ['company_id' => 'user_id']);
    }

    public function getCompaniesChooses() {

        return $this->hasMany(CompaniesChooses::className(), ['company_id' => 'user_id']);
    }

    public function getCompaniesCertificates() {

        return $this->hasMany(CompaniesCertificates::className(), ['company_id' => 'user_id']);
    }

    public function getTestimonials(){
        return $this->hasMany(CompanyProfileTestimonials::className(), ['id' => 'testimonial_id'])->via('companiesTestimonials');

    }
    
    public function getCompaniesTestimonials(){

        return $this->hasMany(CompaniesTestimonials::className(), ['company_id' => 'user_id']);

    }

    public function getCompaniesEmployees(){

        return $this->hasMany(CompaniesEmployees::className(), ['company_id' => 'user_id']);

    }

    public function getCompaniesCapabilities(){

        return $this->hasMany(CompaniesCapabilities::className(), ['company_id' => 'user_id']);

    }

    public function getCompanyContacts(){

        return $this->hasMany(CompaniesEmplContacts::className(), ['company_id' => 'user_id']);

    }
    public function getCompaniesWebinars(){

        return $this->hasMany(CompaniesWebinars::className(), ['company_id' => 'id']);

    }
    public function getWebinars() {

        return $this->hasMany(Webinars::className(), ['id' => 'webinar_id'])->via('companiesWebinars');
    }
    public function getCompaniesRequests(){
        return $this->hasMany(CompaniesPlacementRequests::className(), ['user_id' => 'user_id']);

    }
    public function getRequests(){
        return $this->hasMany(PlacementRequests::className(), ['id' => 'placement_id'])->via('companiesRequests');
    }

    public function getClients() {
        return $this->hasMany(CompanyProfileClients::className(), ['id' => 'client_id'])->via('companiesClients');
    }

    public function getPhotos() {

        return !empty($this->photo) ? '/' . $this->photo : noPhotoSrc();

    }
    public function getActiveWebinars(){
        return $this->hasMany(Webinars::className(), ['id' => 'webinar_id'])->from(['active'=>'in_webinars'])->onCondition(['active.status'=>Webinars::STATUS_ACTIVE])->via('companiesWebinars');
    }
    public function getPassedWebinars(){
        return $this->hasMany(Webinars::className(), ['id' => 'webinar_id'])->from(['passed'=>'in_webinars'])->onCondition(['passed.status'=>Webinars::STATUS_PASSED])->via('companiesWebinars');
    }
    public function getAds(){
        return $this->hasMany(CompanyAds::className(),['user_id'=>'user_id'])->onCondition([CompanyAds::tableName().'.status'=>CompanyAds::STATUS_ACTIVE]);
    }
    public function getSingleLink(){
        return Url::to(['/company/profile','id'=>$this->user_id]);
    }
    public function getComments(){
        return $this->hasMany(Comments::className(), ['id' => 'comment_id'])->via('companiesComments');
    }
    public function getNewsCompany(){
        return $this->hasMany(News::className(),['user_id'=>'user_id'])->from(['company-news'=>'in_news'])->onCondition(['company-news.status'=>News::STATUS_ACTIVE])->andOnCondition(['in','company-news.type_id',[News::COMPANY_NEWS_RU,NEWS::COMPANY_NEWS_EN]]);
    }
    public function getNewsSale(){
        return $this->hasMany(News::className(),['user_id'=>'user_id'])->from(['sale-news'=>'in_news'])->onCondition(['sale-news.status'=>News::STATUS_ACTIVE])->andOnCondition(['sale-news.type_id'=>News::SALE_ADVERTISEMENT]);
    }
    public function getNews(){
        return $this->hasMany(News::className(),['user_id'=>'user_id'])->onCondition(['in_news.status'=>News::STATUS_ACTIVE]);
    }
    public function getCompaniesComments(){

        return $this->hasMany(CompaniesComments::className(), ['user_id' => 'user_id']);

    }
    //TODO надо поставит UploadCounters на company профил страницу что бы каждый раз она обновлялась
    public function getViews(){
        if(!empty($this->views)){
            return $this->views;
        }else{
            return ' ';
        }
    }
    public function getFavorites(){
        return $this->hasMany(Users::className(),['id'=>'user_id'])->from(['like_comments_users'=>'in_users'])->via('commentsFavorites');
    }
    public function getCommentsFavorites()
    {
        return $this->hasMany(CompanyFavorites::className(), ['company_id' => 'id']);
    }
    public function getHasFavorite(){
        $favorites= $this->favorites;
        if($favorites){
            $users = ArrayHelper::getColumn($favorites,"id");
            if(in_array(Yii::$app->user->id,$users)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function getProfileVariants()
    {
        return $this->hasOne(CompanyProfileVariants::className(), ['id' => 'company_variant_id']);
    }
}
