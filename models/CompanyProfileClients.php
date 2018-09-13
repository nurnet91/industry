<?php

namespace app\models;

use app\components\UploadBehavior;
use Faker\Provider\Company;
use Yii;
use yii\httpclient\Client;

/**
 * This is the model class for table "in_clients".
 *
 * @property int $id
 * @property string $name
 * @property string $photo
 *
 * @property CompaniesClients[] $inCompaniesClients
 */
class CompanyProfileClients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $imageFile;
    public $action;

    public static function tableName()
    {
        return 'in_company_profile_clients';
    }

    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_UPDATE] = ['imageFile'];
        $scenarios[self::SCENARIO_CREATE] = ['imageFile'];
        return $scenarios;
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors() {

        return [

            [
                'class' => UploadBehavior::className(),
                'imageFile' => 'imageFile',
                'photo' => 'photo',
                'path' => 'uploads/clients',
            ],

        ];
    }
    public function rules()
    {
        return [
            [['name', 'photo', 'action'], 'string', 'max' => 255],
            [['name','direction_id'],'required'],
//            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'on' => 'create'],
//            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'on' => 'update'],
            [['imageFile'], 'file', 'extensions' => 'png,jpg,jpeg','maxSize' => $this->profileVariants->photo_video_size * (1024 * 1024), 'tooBig' => 'Максимально допустимый размер файла '.$this->profileVariants->photo_video_size. ' мб'],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'on' => self::SCENARIO_CREATE],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'on' => self::SCENARIO_UPDATE],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'direction_id' => 'Direction',
            'name' => 'Name',
            'photo' => 'Photo',
            'imageFile'=>'Загрузить фото'
        ];
    }

    public function getCompaniesClients(){
        return $this->hasOne(CompaniesClients::className(),['client_id'=>'id']);
    }

    public function getPhotos(){
        if(!empty($this->photo)){
            return '/'.$this->photo;
        }else{
            return noPhotoSrc();
        }
    }

    public function getProfileVariants()
    {
        return CompanyInfo::findOne(['user_id' => Yii::$app->user->id])->profileVariants;
    }
}
