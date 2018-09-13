<?php

namespace app\models;

use app\components\UploadBehavior;
use Yii;

/**
 * This is the model class for table "in_company_profile_about_directors".
 *
 * @property int $id
 * @property int $about_id
 * @property string $first_name
 * @property string $last_name
 * @property string $middle_name
 * @property string $position
 * @property string $photo
 */
class CompanyProfileAboutDirectors extends \yii\db\ActiveRecord
{
    public $imageFile;

    public function behaviors()
    {
        return [
            [
                'class' => UploadBehavior::className(),
                'imageFile' => 'imageFile',
                'photo' => 'photo',
                'path' => 'uploads/company_about_directors',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_company_profile_about_directors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['about_id', 'first_name', 'last_name', 'middle_name', 'position'], 'required'],
            [['about_id'], 'integer'],
            [['first_name', 'last_name', 'middle_name', 'position', 'photo'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'on' => 'create'],
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
            'about_id' => 'About ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'middle_name' => 'Middle Name',
            'position' => 'Position',
            'photo' => 'Photo',
        ];
    }

    public function getPhotoD() {

        return !empty($this->photo) ? '/' . $this->photo : noPhotoSrc();

    }

    public function getFio(){
        return $this->last_name.' '.$this->first_name.' '.$this->middle_name;
    }


}
