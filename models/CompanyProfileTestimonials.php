<?php

namespace app\models;

use app\components\UploadBehavior;
use Yii;

/**
 * This is the model class for table "in_company_testimonials".
 *
 * @property int $id
 * @property string $fio
 * @property string $company_name
 * @property string $position
 * @property string $description
 * @property string $photo
 */
class CompanyProfileTestimonials extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $imageFile;

    public static function tableName()
    {
        return 'in_company_profile_testimonials';
    }

    public function behaviors()
    {

        return [

            [
                'class' => UploadBehavior::className(),
                'imageFile' => 'imageFile',
                'photo' => 'photo',
                'path' => 'uploads/company-testimonials',
            ],

        ];
    }
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['description','fio', 'direction_id'],'required'],
            [['direction_id'],'integer'],
            [['fio', 'company_name', 'position', 'photo'], 'string', 'max' => 255],
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
            'id' => t('ID'),
            'direction_id' => t('Direction'),
            'fio' => t('Fio'),
            'company_name' => t('Company Name'),
            'position' => t('Position'),
            'description' =>t( 'Description'),
            'photo' => t('Photo'),
            'imageFile'=>t('imageFile')
        ];
    }
    public function getPhotos()
    {
        if (!empty($this->photo)) {
            return '/' . $this->photo;
        } else {
            return noPhotoSrc();
        }
    }

    public function getCompaniesTestimonials(){
        return $this->hasOne(CompaniesTestimonials::className(),['testimonial_id'=>'id']);
    }
}
