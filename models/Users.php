<?php

namespace app\models;

use bizley\podium\db\UserQuery;
use ErrorException;
use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\IdentityInterface;
use yii\web\User;

class Users extends ActiveRecord implements IdentityInterface{

    const ROLE_ADMIN = 1;
    const ROLE_USER = 2;
    const ROLE_COMPANY = 3;
    const ROLE_MANAGER = 4;
    const STATUS_ACTIVE = 1;

    public $profile;

    protected static $user_roles = [
        1 => 'ROLE_ADMIN',
        2 => 'ROLE_USER',
        3 => 'ROLE_COMPANY',
        4 => 'ROLE_MANAGER',
    ];

    public $password = null;

    public static function tableName() {

        return 'in_users';

    }

    public function rules() {

        return [
            [['username', 'email', 'role_id', 'country_id', 'region_id'], 'required'],
            [['email'], 'email'],
            [['password'], 'validatePasswordInput'],
            [['password'], 'string', 'min' => 8, 'max' => 250, 'on' => 'create'],
            [['status', 'role_id', 'country_id', 'region_id', 'city_id', 'doverenniy'], 'integer'],
            [['username', 'email', 'password_hash', 'auth_key', 'password_reset_token', 'social_id', 'social_name', 'last_ip'], 'string', 'max' => 250],
            [['username', 'email'], 'unique'],
            [['created_at', 'updated_at', 'last_visit'], 'safe'],
        ];

    }

    public function attributeLabels() {

        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password_hash' => 'Password Hash',
            'auth_key' => 'Auth Key',
            'password_reset_token' => 'Password Reset Token',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'role_id' => 'Role',
            'social_id' => 'Social ID',
            'social_name' => 'Social name',
            'password' => 'Password',
            'last_visit' => 'Last Visit',
            'last_ip' => 'Last IP',
            'country_id' => 'Country ID',
            'region_id' => 'Region ID',
            'city_id' => 'City ID',
            'doverenniy' => 'Doverenniy',
        ];

    }

    public function validatePasswordInput($attribute, $params) {

        if ($this->isNewRecord AND empty($this->password)) {

            $this->addError($attribute, 'Please set password');

        }
        
    }

    public static function allowedRoles() {

        return [self::ROLE_USER, self::ROLE_COMPANY];

    }

    public static function byType($type) {

        if (array_key_exists($type, self::$user_roles)) {

            return self::$user_roles[$type];

        }

        return self::$user_roles[self::ROLE_USER];

    }

    public static function rolesWithoutAdmin() {

        $roles = self::$user_roles;

        unset($roles[self::ROLE_ADMIN]);

        return $roles;

    }

    public static function rolesWithoutManager() {

        $roles = self::$user_roles;

        unset($roles[self::ROLE_MANAGER]);

        return $roles;

    }

    public static function rolesAll() {

        $roles = self::$user_roles;

        return $roles;

    }

    public function getCountry() {

        return $this->hasOne(Countries::className(), ['id' => 'country_id']);

    }

    public function getRegion() {

        return $this->hasOne(Regions::className(), ['id' => 'region_id']);

    }
    public function getCity(){
        return $this->hasOne(Cities::className(),['id'=>'city_id']);
    }

    public function getInterests() {

        return $this->hasMany(Interests::className(), ['user_id' => 'id']);

    }

    public function getMessages() {

        return $this->hasMany(UserMessages::className(), ['user_id' => 'id'])->limit(5)->orderBy(['readed' => SORT_ASC, 'created_at' => SORT_DESC]);

    }

    public function getMessagecount() {

        $model_cnt = UserMessages::find()->where(['user_id' => Yii::$app->user->identity->id, 'readed' => 0])->count();

        return $model_cnt;
        
    }

    public function getInfo() {

        return $this->hasOne(Userinfo::className(), ['user_id' => 'id']);

    }

    public function getCompanyinfo(){

        return $this->hasOne(CompanyInfo::className(),['user_id'=>'id']);

    }

    public function takeCountryAndRegion() {

        $country = $this->country;

        $region = $this->region;

        $txt = '';

        if (!empty($country)) {

            $txt .= $country->name;
            
        }

        if (!empty($region)) {

            if (!empty($txt)) {

                $txt .= ',';

            }

            $txt .= ' ' . $region->name;
            
        }

        return $txt;
        
    }

    public function beforeSave($insert) {

        if (parent::beforeSave($insert)) {

            if (!array_key_exists($this->role_id, self::rolesAll())) {

                $this->role_id = self::ROLE_USER;

            }
            
            if (!empty($this->password)) {

                $this->setPassword($this->password);

            }

            if (!$this->isNewRecord) {

                $this->updated_at = date('Y-m-d H:i:s');

            } else {

                if($this->social_id == 0){

                    $this->generateAuthKey();

                    $this->last_ip = Yii::$app->request->userIP;

                }
            }

            return true;
        }

        return false;

    }

    public function saveInterests($post) {

        if (!empty($post) AND is_array($post)) {

            $cats = Categories::findByLan()->andWhere(['in', 'id', $post])->all();

            if (!empty($cats)) {

                foreach ($cats as $cat) {

                    $interest = new Interests();
                    $interest->user_id = $this->id;
                    $interest->category_id = $cat->id;
                    $interest->save();

                }

            }

        }

    }

    public static function findIdentity($id) {

        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);

    }

    public static function findByAuthKey($key) {

        return static::find()->where(['auth_key' => $key])
            ->andWhere(['in', 'role_id', self::allowedRoles()])->one();

    }

    public static function findIdentityByAccessToken($token, $type = null) {

        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');

    }

    public static function findByUsernameAll($username) {

        return static::find()->where(['username' => $username])->one();

    }

    public static function findByUsername($username) {

        return static::find()->where(['username' => $username, 'status' => self::STATUS_ACTIVE])
            ->andWhere(['in', 'role_id', self::allowedRoles()])->one();

    }

    public static function findByUsernameAdmin($username) {

        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE, 'role_id' => self::ROLE_ADMIN]);

    }

    public static function findByEmailAll($email) {

        return static::find()->where(['email' => $email])->one();

    }

    public static function findByEmail($email) {

        return static::find()->where(['email' => $email, 'status' => self::STATUS_ACTIVE])
            ->andWhere(['in', 'role_id', self::allowedRoles()])->one();

    }

    public function sendToEmailPasswordResetToken() {

        $url = Url::home(true)."site/reset/".$this->password_reset_token;

        Yii::$app->mailer->compose()
            ->setTo($this->email)
            ->setFrom(['industry2@mail.ru' => 'Industry Hunter'])
            ->setSubject('Password Reset Url')
            ->setTextBody("<a href='".$url."'>".$url."</a>")
            ->send();

        return true;

    }
    public function sendLoginPassword($password){
        Yii::$app->mailer->compose()
            ->setTo($this->email)
            ->setFrom(['industry2@mail.ru' => 'Industry Hunter'])
            ->setSubject('Вам пришло логин пароль для в авторизаци Industry Hunter')
            ->setTextBody('Пароль:'.$password.PHP_EOL.'Логин:'.$this->username.PHP_EOL)
            ->send();
    }

    public function getId() {

        return $this->getPrimaryKey();

    }

    public function getAuthKey() {

        return $this->auth_key;

    }

    public function validateAuthKey($authKey) {

        return $this->getAuthKey() === $authKey;

    }

    public function validatePassword($password) {

        return Yii::$app->security->validatePassword($password, $this->password_hash);

    }

    public function setPassword($password) {

        $this->password_hash = Yii::$app->security->generatePasswordHash($password);

    }

    public function generateAuthKey() {

        $this->auth_key = Yii::$app->security->generateRandomString();

    }

    public static function findByPasswordResetToken($token) {

        if (!static::isPasswordResetTokenValid($token)) {

            return null;

        }

        return static::find()->where(['password_reset_token' => $token])
            ->andWhere(['in', 'role_id', self::allowedRoles()])->one();

    }

    public static function isPasswordResetTokenValid($token) {

        if (empty($token)) {

            return false;

        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);

        $expire = Yii::$app->params['user.passwordResetTokenExpire'];

        return $timestamp + $expire >= time();

    }

    public function generatePasswordResetToken() {

        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();

    }

    public function removePasswordResetToken() {

        $this->password_reset_token = null;

    }

    public static function findByEAuth($service) {

        $user = self::findByEmailAll($service->getAttribute('email'));

        if(!is_null($user) && $user->status == 1) {
            $id = $service->getServiceName() . '-' . $service->getId();

            if ($user->auth_key == md5($id)) {
                return $user;
            }
        }

        return $user;
    }

    public static function selectList() {

        $list = self::find()->select(['id', 'username'])->where(['status' => 1])->all();

        return ArrayHelper::map($list, 'id', 'username');

    }

    public static function allUsersToList() {

        $list = self::find()->select(['id', 'email'])->all();

        return ArrayHelper::map($list, 'id', 'email');

    }

    public static function find()    {

        return new UsersQuery(get_called_class());

    }
    public function getMaps(){
        if(empty($this->country)){
            return t('не задано');
        }
        return $this->country.','.$this->region;
    }
    public function getAds(){
        return $this->hasMany(CompanyAds::className(),['user_id'=>'id']);
    }
    public function getPublications(){
        return $this->hasMany(Publications::className(),['user_id'=>'id']);
    }
    public function getNews(){
        return $this->hasMany(News::className(),['user_id'=>'id'])->onCondition(['in_news.status'=>News::STATUS_ACTIVE]);
    }
    public function getNewsCompany(){
        return $this->hasMany(News::className(),['user_id'=>'id'])->from(['company-news'=>'in_news'])->onCondition(['company-news.status'=>News::STATUS_ACTIVE])->andOnCondition(['in','company-news.type_id',[News::COMPANY_NEWS_RU,NEWS::COMPANY_NEWS_EN]]);
    }
    public function getNewsSale(){
        return $this->hasMany(News::className(),['user_id'=>'id'])->from(['sale-news'=>'in_news'])->onCondition(['sale-news.status'=>News::STATUS_ACTIVE])->andOnCondition(['sale-news.type_id'=>News::SALE_ADVERTISEMENT]);
    }
    public function getSingleLink(){
        return Url::to(['/personal/profile','id'=>$this->id]);
    }


    public function getSeenCompany(){
        return $this->hasMany(SeenCompany::className(), ['user_id' => 'id']);
    }
    public function getSeen() {

        return $this->hasMany(CompanyInfo::className(), ['id' => 'company_id'])->via('seenCompany');
    }
    public function getAbout(){
        return $this->hasMany(CompanyProfileAbout::className(),['user_id'=>'id']);
    }
    public function getFavorites(){
        return $this->hasMany(CompanyInfo::className(),['id'=>'company_id'])->via('companyFavorites');
    }
    public function getCompanyFavorites()
    {
        return $this->hasMany(CompanyFavorites::className(), ['user_id' => 'id']);
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

}
