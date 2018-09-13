<?php

namespace app\models;

use app\components\DataLinkBehaviors;
use app\components\FileUploadBehavior;
use app\components\UploadBehavior;
use Yii;

/**
 * This is the model class for table "in_company_about".
 *
 * @property int $id
 * @property string $description
 */
class CompanyProfileAbout extends \yii\db\ActiveRecord
{

    public $imageFile;

    public function behaviors()
    {
        return [
            [
                'class' => UploadBehavior::className(),
                'imageFile' => 'imageFile',
                'photo' => 'media',
                'path' => 'uploads/company_about',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_company_profile_about';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string', 'max' => 1000],
            [['direction_id',],'integer'],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'on' => 'create', 'maxSize' => $this->profileVariants->photo_video_size * 1024],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'on' => 'update']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
            'media' => 'Media'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompaniesAbout()
    {
        return $this->hasOne(CompaniesAbout::className(), ['about_id' => 'id']);
    }

    public function getAboutDirectors()
    {
        return $this->hasMany(CompanyProfileAboutDirectors::className(), ['about_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanies()
    {
        return $this->hasOne(CompanyInfo::className(), ['user_id' => 'company_id'])->viaTable('in_companies_about', ['about_id' => 'id']);
    }

    public function getProfileVariants()
    {
        return CompanyInfo::findOne(['user_id' => Yii::$app->user->id])->profileVariants;
    }

}
