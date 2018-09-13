<?php

namespace app\models;

use app\components\MultipleUploadBehavior;
use app\components\UploadBehavior;
use app\controllers\CompanyController;
use Yii;

/**
 * This is the model class for table "in_company_capabilities".
 *
 * @property int $id
 * @property int $direction_id
 * @property int $theme_id
 * @property int $user_id
 * @property string $photo
 * @property string $video
 * @property string $title
 * @property string $description
 */
class CompanyProfileCapabilities extends \yii\db\ActiveRecord
{

    public $imageFile2;
    public $imageFile;
    public $action;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_company_profile_capabilities';
    }

    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_UPDATE] = ['imageFile', 'imageFile2'];
        $scenarios[self::SCENARIO_CREATE] = ['imageFile', 'imageFile2'];
        return $scenarios;
    }

    public function behaviors() {

        return [

            [
                'class' => MultipleUploadBehavior::className(),
                'attribute' => 'imageFile',
                'column' => 'photo',
                'path' => 'uploads/capabilities',
            ],

            [
                'class' => MultipleUploadBehavior::className(),
                'attribute' => 'imageFile2',
                'column' => 'video',
                'path' => 'uploads/capabilities',
            ],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['direction_id', 'theme_id'], 'integer',],
            [['title'], 'string'],
            [['description', 'action'], 'string'],
            [['description', 'title'],'required'],
            [['photo'], 'string'],
            [['video'], 'string'],
            [['imageFile'], 'file','skipOnEmpty' => false, 'on' => self::SCENARIO_CREATE],
            [['imageFile'], 'file','skipOnEmpty' => true, 'on' => self::SCENARIO_UPDATE],
            [['imageFile2'], 'file','skipOnEmpty' => false, 'on' => self::SCENARIO_CREATE],
            [['imageFile2'], 'file','skipOnEmpty' => true, 'on' => self::SCENARIO_UPDATE],
            [['imageFile'], 'file', 'extensions' => 'png,jpg,jpeg','maxSize' => $this->profileVariants->photo_video_size * (1024 * 1024), 'tooBig' => 'Максимально допустимый размер файла '.$this->profileVariants->photo_video_size. ' мб', 'maxFiles' => $this->profileVariants->photos_count, 'minFiles' => 1],
            [['imageFile2'], 'file', 'extensions' => 'mp4,flv,m4v','maxSize' => $this->profileVariants->photo_video_size * (1024 * 1024), 'tooBig' => 'Максимально допустимый размер файла '.$this->profileVariants->photo_video_size. ' мб', 'maxFiles' => $this->profileVariants->videos_count, 'minFiles' => 1],

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
            'theme_id' => 'Theme',
            'photo' => 'Photo',
            'video' => 'Video',
            'title' => 'Title',
            'description' => 'Description',
        ];
    }

    public function getPhotos()
    {
        if(!empty($this->photo)){
            return $this->photo;
        }else{
           return false;
        }
    }

    public function getVideos()
    {
        if(!empty($this->video)){
            return $this->video;
        }else{
           return false;
        }
    }

    public function getCompaniesCapability()
    {
        return $this->hasOne(CompaniesCapabilities::className(), ['capability_id' => 'id']);
    }

    public function getProfileVariants()
    {
        return CompanyInfo::findOne(['user_id' => Yii::$app->user->id])->profileVariants;
    }
}
