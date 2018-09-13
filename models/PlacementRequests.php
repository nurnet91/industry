<?php

namespace app\models;

use app\components\MultipleAddBehaviors;
use app\components\MultipleAddSendEmailBehaviors;
use app\components\TextAddToFileBehaviors;
use app\components\UploadBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\helpers\Url;

/**
 * This is the model class for table "in_placement_requests".
 *
 * @property int $id
 * @property string $company_name
 * @property string $phone
 * @property string $email
 * @property string $middle_name
 * @property string $first_name
 * @property string $last_name
 * @property string $requisites
 * @property string $file_requisites
 * @property string $file
 * @property string $comment
 */
class PlacementRequests extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $ids;
    public $dataFile;
    public $dataFileRequisites;
    const STATUS_ACTIVE = 1;
    const STATUS_NOACTIVE = 0;
    public function behaviors()
    {
        return [
            [
                'class' => UploadBehavior::className(),
                'imageFile' => 'dataFile',
                'photo' => 'file',
                'path' => 'files/placement-requests',
            ],
            [
                'class' => UploadBehavior::className(),
                'imageFile' => 'dataFileRequisites',
                'photo' => 'file_requisites',
                'path' => 'files/placement-requests',
            ],
            [
                'class' => MultipleAddSendEmailBehaviors::className(),
                'multiAttribute' => 'ids',
                'relationName' => 'company',
                'modelRelationName' => CompanyInfo::className()
            ],
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT =>['created_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
            [
                'class'=>TextAddToFileBehaviors::className(),
                'attributeFile' => 'file_requisites',
                'attributeText' => 'requisites',
                'path' => 'files/placement-requests',
                'extension' => 'txt'
            ]
        ];
    }

    public static function tableName()
    {
        return 'in_placement_requests';
    }

    /**
     * {@inheritdoc}
     */
    //НАДО НАПИСАТ JS ЧТО БЫ  ОТПРАВИТ ЗАПРОС ЕСЛИ НЕ ВЫБРАНЫ КОМПАНИИ ТО ФОРМА НЕ ОТПРАВЛАЕТ ЗАПРОС
    public function rules()
    {
        return [
            [['token'], 'string'],
            [['status'],'default','value' => self::STATUS_NOACTIVE],
            [['user_id'],'default','value' => function(){
                if(Yii::$app->user->isGuest){
                    return 0;
                }else{
                   return  Yii::$app->user->id;
                }
            }],
            [['ids'],'safe'],
            [['email'],'email'],
            [['company_name', 'phone', 'email', 'middle_name', 'first_name', 'last_name', 'file_requisites', 'file'], 'string', 'max' => 255],
            [['comment','requisites'],'string','max'=>1000],
            [['company_name', 'phone', 'email', 'middle_name', 'first_name', 'last_name','requisites'],'required'],
            [['dataFile','dataFileRequisites'], 'file', 'skipOnEmpty' => false, 'extensions' => 'txt,zip,pdf,doc,docx,dot,dotx,xls,xlsx,xlt,xla,ppt,ppo,pps,ppa,rar,avi,mp4,mpeg,ogv,webm,3gp,3g2,7z$', 'on' => 'create'],
            [['dataFile','dataFileRequisites'], 'file', 'skipOnEmpty' => true, 'extensions' => 'txt,zip,pdf,doc,docx,dot,dotx,xls,xlsx,xlt,xla,ppt,ppo,pps,ppa,rar,avi,mp4,mpeg,ogv,webm,3gp,3g2,7z$', 'on' => 'update'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_name' => t('Название компании'),
            'phone' => t('Телефон'),
            'email' => t('E-маил'),
            'middle_name' => t('Отчество'),
            'first_name' => t('Имя'),
            'last_name' => t('Фамилия'),
            'requisites' => t('Реквизиты'),
            'file_requisites' => t('Название компании'),
            'file' => t('Название компании'),
            'comment' => t('Комментарий'),
            'ids'=>t('Не обходымо выбрат компанию'),
            'status'=>t('Status'),
        ];
    }

    public function validateIds($attribute, $params) {

        if($this->ids == null){

            $this->addError($attribute, t('Не обходымо выбрат компанию.'));

        }

    }

    public function getCompany(){
        return $this->hasMany(CompanyInfo::className(), ['user_id' => 'user_id'])->via('companiesPlacement');

    }

    public function getCompaniesPlacement(){

        return $this->hasMany(CompaniesPlacementRequests::className(), ['placement_id' => 'id']);

    }
    public function findUser(){
        if(!Yii::$app->user->isGuest){
               return  $user = Users::find()->self()->companyInfo()->userInfo()->one();
        }
    }
    public static function findByPasswordResetToken($token) {

        if (!static::isPasswordResetTokenValid($token)) {

            return null;

        }

        return static::find()->where(['token' => $token])->one();

    }

    public static function isPasswordResetTokenValid($token) {

        if (empty($token)) {

            return false;

        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);

        $expire = Yii::$app->params['user.passwordResetTokenExpire'];

        return $timestamp + $expire >= time();

    }
    public function getFio(){
        return $this->last_name.' '.$this->first_name.' '.$this->middle_name;
    }
    public function getPhone(){
        return $this->phone;
    }
    public function getCompaniesRequests(){
        return $this->hasMany(CompaniesPlacementRequests::className(), ['placement_id' => 'id']);

    }
    public function getUsers(){
        return $this->hasMany(Users::className(), ['id' => 'user_id'])->via('companiesRequests');
    }






}
