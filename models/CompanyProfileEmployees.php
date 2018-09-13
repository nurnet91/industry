<?php

namespace app\models;

use app\components\UploadBehavior;
use Yii;

/**
 * This is the model class for table "in_employees".
 *
 * @property int $id
 * @property string $fio
 * @property string $role
 * @property string $direction
 * @property string $themes
 * @property string $sub_themes
 * @property string $phone
 * @property string $email
 *
 * @property CompaniesEmployees $inCompaniesEmployees
 * @property CompanyInfo[] $companies
 */
class CompanyProfileEmployees extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $imageFile;
    public $themeIds;
    public $subThemeIds;
    public $direction;
    public $action;

    public static function tableName()
    {
        return 'in_company_profile_employees';
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


    public function behaviors()
    {
        return [

            [
                'class' => UploadBehavior::className(),
                'imageFile' => 'imageFile',
                'photo' => 'photo',
                'path' => 'uploads/employees',
            ],

        ];
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio', 'role', 'phone', 'email','photo', 'theme_ids', 'sub_theme_ids', 'direction', 'action'], 'string', 'max' => 255],
            [['fio','role','phone','email', 'direction_id', 'theme_ids'],'required'],
            ['email','email'],
            [['direction_id'], 'integer'],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'on' => self::SCENARIO_CREATE],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'on' => self::SCENARIO_UPDATE],
            [['imageFile'], 'file', 'extensions' => 'png,jpg,jpeg','maxSize' => $this->profileVariants->photo_video_size * (1024 * 1024), 'tooBig' => 'Максимально допустимый размер файла '.$this->profileVariants->photo_video_size. ' мб'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => t('ID'),
            'direction_id' => t('Direction ID'),
            'direction' => t('Direction'),
            'theme_ids' => t('Theme ID'),
            'sub_theme_ids' => t('Sub Theme ID'),
            'fio' => t('Fio'),
            'role' => t('Role'),
            'phone' => t('Phone number'),
            'photo'=>t('Photo'),
            'email' => t('Email'),
            'imageFile'=>t('imageFile')
        ];
    }

    public function getPhotos()
    {
        if (!empty($this->photo)) {
            return '/' . $this->photo;
        } else {
            return false;
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompaniesEmployees()
    {
        return $this->hasOne(CompaniesEmployees::className(), ['employee_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanies()
    {
        return $this->hasOne(CompanyInfo::className(), ['user_id' => 'company_id'])->viaTable('in_companies_employees', ['employee_id' => 'id']);
    }

    public function getProfileVariants()
    {
        return CompanyInfo::findOne(['user_id' => Yii::$app->user->id])->profileVariants;
    }
}
