<?php

namespace app\models;

use app\components\UploadBehavior;
use Yii;

/**
 * This is the model class for table "in_certificates".
 *
 * @property int $id
 * @property string $direction_id
 * @property string $description
 * @property string $photo
 *
 * @property CompaniesCertificates[] $inCompaniesCertificates
 */
class CompanyProfileCertificates extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $imageFile;

    public static function tableName()
    {
        return 'in_company_profile_certificates';
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
                'path' => 'uploads/certificates',
            ],

        ];
    }
    public function rules()
    {
        return [
            [['direction_id'], 'integer'],
            [['description'], 'string'],
            [['photo'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'on' => 'create'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'on' => 'update'],
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
            'photo' => 'Photo',
            'imageFile'=>'Загрузить фото'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInCompaniesCertificates()
    {
        return $this->hasOne(CompaniesCertificates::className(), ['certificate_id' => 'id']);
    }
    public function getPhotos(){
        if(!empty($this->photo)){
            return '/'.$this->photo;
        }else{
            return noPhotoSrc();
        }
    }
}
