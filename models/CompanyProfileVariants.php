<?php

namespace app\models;

use Yii;
use app\components\TimeBehavior;
use app\components\UploadBehavior;
use app\models\queries\CompanyVariantsQuery;
use yii\helpers\FileHelper;

class CompanyProfileVariants extends \yii\db\ActiveRecord {

    public $imageFile;

    public static function tableName() {

        return 'in_company_variants';

    }

    public function behaviors() {

        return [
            [
                'class' => TimeBehavior::className(),
            ],
            [
                'class' => UploadBehavior::className(),
                'imageFile' => 'imageFile',
                'photo' => 'profile_icon',
                'path' => 'uploads/company_variants',
            ],
        ];
        
    }

    public function rules() {

        return [
            [['name', 'price'], 'required'],
            [['industries_count', 'services_count', 'photos_count', 'videos_count', 'photo_video_size', 'show_priority', 'on_reviews', 'special_share', 'extra_sections_ch_n', 'extra_sections_sh_r_c', 'tenders_notification', 'statistics', 'update_info', 'vacancy_deploy', 'equipment_deploy', 'on_tenders', 'price', 'promo_price', 'status'], 'integer'],
            [['name', 'profile_icon'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'on' => 'create'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'on' => 'update'],
            [['created_at', 'updated_at'], 'safe'],
        ];

    }

    public function attributeLabels() {

        return [
            'id' => 'ID',
            'name' => t('Profile name'),
            'profile_icon' => 'Profile icon',
            'industries_count' => 'Industries Count',
            'services_count' => 'Services Count',
            'photos_count' => 'Photos Count',
            'videos_count' => 'Videos Count',
            'photo_video_size' => 'Photo/Video Size (mb)',
            'show_priority' => 'Shows Priority',
            'on_reviews' => 'On reviews in services',
            'special_share' => 'Inform about special share',
            'extra_sections_ch_n' => 'Show in extra sections "Why choice us", "Company news"',
            'extra_sections_sh_r_c' => 'Show in extra Sections "Shares" "Reviews" "Our clients"',
            'tenders_notification' => 'Tenders Notification',
            'statistics' => 'Statistics',
            'update_info' => 'Profile update info',
            'vacancy_deploy' => 'Vacancy Deployments',
            'equipment_deploy' => 'Equipment Deployments',
            'on_tenders' => 'On Tenders',
            'price' => 'Price',
            'promo_price' => 'Promo Price',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
        
    }

    public static function find() {
        
        return new CompanyVariantsQuery(get_called_class());

    }

}
