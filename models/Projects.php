<?php

namespace app\models;

use Yii;
use app\components\TimeBehavior;
use app\components\UploadBehavior;
use app\models\queries\ProjectsQuery;

class Projects extends \yii\db\ActiveRecord {

    public $imageFile;

    public static function tableName() {

        return 'in_b_projects';

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
                'path' => 'uploads/projects',
            ],
        ];
        
    }

    public function rules() {

        return [
            [['title_ru', 'title_en', 'title_ua'], 'required'],
            [['info_ru', 'info_en', 'info_ua'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['status'], 'integer'],
            [['photo', 'title_ru', 'title_en', 'title_ua', 'link', 'duration_ru', 'duration_en', 'duration_ua', 'language_ru', 'language_en', 'language_ua'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'on' => 'create'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'on' => 'update'],
        ];

    }

    public function attributeLabels() {

        return [
            'id' => 'ID',
            'photo' => 'Photo',
            'title_ru' => 'Title Ru',
            'title_en' => 'Title En',
            'title_ua' => 'Title Ua',
            'link' => 'Link',
            'duration_ru' => 'Duration Ru',
            'duration_en' => 'Duration En',
            'duration_ua' => 'Duration Ua',
            'language_ru' => 'Language Ru',
            'language_en' => 'Language En',
            'language_ua' => 'Language Ua',
            'info_ru' => 'Info Ru',
            'info_en' => 'Info En',
            'info_ua' => 'Info Ua',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
            'imageFile' => 'Image',
        ];

    }

    public function getTitle() {

        $lan = Yii::$app->language;

        $txt = 'title_'.$lan;

        return $this->$txt;

    }

    public function getDuration() {

        $lan = Yii::$app->language;

        $txt = 'duration_'.$lan;

        return $this->$txt;

    }

    public function getLanguage() {

        $lan = Yii::$app->language;

        $txt = 'language_'.$lan;

        return $this->$txt;

    }

    public function getInfo() {

        $lan = Yii::$app->language;

        $txt = 'info_'.$lan;

        return $this->$txt;

    }

    public static function find() {
        
        return new ProjectsQuery(get_called_class());

    }

}
