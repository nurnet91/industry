<?php

namespace app\models;

use app\components\UploadBehavior;
use Yii;

/**
 * This is the model class for table "in_chooses".
 *
 * @property int $id
 * @property int $direction_id
 * @property string $photo
 * @property string $description
 *
 * @property CompaniesChooses[] $inCompaniesChooses
 */
class CompanyProfileChooses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $imageFile;
    public $action;

    public static function tableName()
    {
        return 'in_company_profile_chooses';
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
                'path' => 'uploads/chooses',
            ],

        ];
    }
    public function rules()
    {
        return [
            [['description', 'action'], 'string','max'=>255],
            [['photo'], 'string', 'max' => 255],
            [['direction_id'], 'integer'],
            [['direction_id', 'description'], 'required'],
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
            'photo' => 'Photo',
            'description' => 'Description',
        ];
    }
    public function getPhotos(){
        if(!empty($this->photo)){
            return '/'.$this->photo;
        }else{
            return false;
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInCompaniesChooses()
    {
        return $this->hasOne(CompaniesChooses::className(), ['choose_id' => 'id']);
    }

    public function getProfileVariants()
    {
        return CompanyInfo::findOne(['user_id' => Yii::$app->user->id])->profileVariants;
    }
}
