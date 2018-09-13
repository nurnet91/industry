<?php

namespace app\models;

use Yii;
use app\components\TimeBehavior;
use app\components\UploadBehavior;
use yii\helpers\FileHelper;
use yii\web\IdentityInterface;

class Userinfo extends \yii\db\ActiveRecord {

    public $day = null;
    public $month = null;
    public $year = null;

    public $imageFile;
    public $cat_ids = [];

    public $country;
    public $region;

    public static function tableName() {

        return 'in_user_info';

    }

    public function behaviors() {

        return [
            [
                'class' => TimeBehavior::className(),
            ],
            [
                'class' => UploadBehavior::className(),
                'imageFile' => 'imageFile',
                'photo' => 'photo',
                'path' => 'uploads/users',
            ],
        ];
        
    }

    public function rules() {

        return [
            [['first_name', 'last_name'], 'required'],
            ['country', 'validateCountry'],
            ['region', 'validateRegion'],

            [['user_id', 'referal_id', 'info_inform', 'info_special', 'info_offer', 'sex', 'repost', 'day', 'month', 'year'], 'integer'],
            [['created_at', 'updated_at', 'cat_ids'], 'safe'],
            [['first_name', 'last_name', 'middle_name', 'company', 'position', 'photo', 'social_url', 'category_ids'], 'string', 'max' => 250],
            [['phone', 'skype'], 'string', 'max' => 100],
            [['site_company'], 'string', 'max' => 200],
            [['b_date'], 'string', 'max' => 10],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'on' => 'create'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'on' => 'update'],
        ];

    }

    public function validateCountry($attribute, $params) {

        $country = Countries::findOne($this->country);

        if(empty($country)){

            $this->addError($attribute, 'Country not found');

        }

    }

    public function validateRegion($attribute, $params) {

        $country = Countries::findOne($this->country);


        if(empty($country)){

            $this->addError($attribute, 'Choose please first country');

        } else {

            $region = Regions::find()->where(['country_id' => $this->country, 'id' => $this->region])->one();

            if (empty($region)) {

                $this->addError($attribute, 'Region not found');
                
            }

        }

    }

    public function attributeLabels() {

        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'middle_name' => 'Middle Name',
            'b_date' => 'B Date',
            'referal_id' => 'Referal ID',
            'company' => 'Company',
            'position' => 'Position',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'info_inform' => 'Info Inform',
            'info_special' => 'Info Special',
            'info_offer' => 'Info Offer',
            'category_ids' => 'Categories',
            'phone' => 'Phone',
            'skype' => 'Skype',
            'site_company' => 'Site Company',
            'sex' => 'Sex',
            'photo' => 'Photo',
            'repost' => 'Repost',
            'day' => 'Day',
            'month' => 'Month',
            'year' => 'Year',
            'social_url' => 'Social url',
            'country' => t('Country'),
            'region' => t('Region'),
        ];

    }

    public function beforeSave($insert) {

        if (parent::beforeSave($insert)) {

            $this->generateBdate();

            return true;

        }

        return false;
    }

    public function generateBdate() {

        $bdate = $this->day . '.' . $this->month . '.' . $this->year;

        if (strlen($bdate) >= 8 OR strlen($bdate) <= 10) {

            $bdate = strtotime($bdate);

            if ($bdate < strtotime('-1 day') AND $bdate > strtotime('-100 years')) {

                $this->b_date = date("Y-m-d", $bdate);

            }

        }

    }
    
    public function takeBirthDate() {

        $txt = "";

        if (!empty($this->b_date)) {

            $txt = date("d/m/Y", strtotime($this->b_date));

            $txt .= ' г.р.';
            
        }

        return $txt;
        
    }

    public function takeFio() {

        $txt = $this->last_name . ' ' .$this->first_name . ' ' .$this->middle_name;

        return $txt;
        
    }

    public function takeSex() {

        $txt = t('Не задан');

        if ($this->sex == 1) {

            $txt = t('Мужчина');
            
        } else if($this->sex == 0) {

            $txt = t('Женщина');

        }

        return $txt;
        
    }
    public function __toString() {

        return $this->last_name.' '.$this->first_name.' '.$this->middle_name;   // TODO: Implement __toString() method.

    }

}
