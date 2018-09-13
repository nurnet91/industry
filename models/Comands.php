<?php

namespace app\models;

use Yii;
use app\components\TimeBehavior;
use app\components\UploadBehavior;
use app\models\queries\ComandsQuery;

class Comands extends \yii\db\ActiveRecord {

    public $imageFile;
    
    public static function tableName() {

        return 'in_b_commands';

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
                'path' => 'uploads/comands',
            ],

        ];
        
    }

    public function rules() {

        return [
            [['fio_ru', 'fio_en', 'fio_ua', 'education_ru', 'education_en', 'education_ua', 'experience_ru', 'experience_en', 'experience_ua'], 'required'],
            [['info_ru', 'info_en', 'info_ua'], 'string'],
            [['photo', 'fio_ru', 'fio_en', 'fio_ua', 'occupation_ru', 'occupation_en', 'occupation_ua', 'education_ru', 'education_en', 'education_ua', 'regalia_ru', 'regalia_en', 'regalia_ua', 'experience_ru', 'experience_en', 'experience_ua'], 'string', 'max' => 255],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'on' => 'create'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'on' => 'update'],
        ];

    }

    public function attributeLabels() {

        return [
            'id' => 'ID',
            'photo' => 'Photo',
            'fio_ru' => 'Fio Ru',
            'fio_en' => 'Fio En',
            'fio_ua' => 'Fio Ua',
            'occupation_ru' => 'Occupation Ru',
            'occupation_en' => 'Occupation En',
            'occupation_ua' => 'Occupation Ua',
            'education_ru' => 'Education Ru',
            'education_en' => 'Education En',
            'education_ua' => 'Education Ua',
            'regalia_ru' => 'Regalia Ru',
            'regalia_en' => 'Regalia En',
            'regalia_ua' => 'Regalia Ua',
            'experience_ru' => 'Experience Ru',
            'experience_en' => 'Experience En',
            'experience_ua' => 'Experience Ua',
            'info_ru' => 'Info Ru',
            'info_en' => 'Info En',
            'info_ua' => 'Info Ua',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];

    }

    public function getFio() {

        $lan = Yii::$app->language;

        $txt = 'fio_'.$lan;

        return $this->$txt;

    }

    public function getOccupation() {

        $lan = Yii::$app->language;

        $txt = 'occupation_'.$lan;

        return $this->$txt;

    }

    public function getEducation() {

        $lan = Yii::$app->language;

        $txt = 'education_'.$lan;

        return $this->$txt;

    }

    public function getRegalia() {

        $lan = Yii::$app->language;

        $txt = 'regalia_'.$lan;

        return $this->$txt;

    }

    public function getExperience() {

        $lan = Yii::$app->language;

        $txt = 'experience_'.$lan;

        return $this->$txt;

    }

    public function getInfo() {

        $lan = Yii::$app->language;

        $txt = 'info_'.$lan;

        return $this->$txt;

    }

    public static function find() {
        
        return new ComandsQuery(get_called_class());

    }

}
