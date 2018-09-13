<?php

namespace app\models;

use Yii;
use app\components\TimeBehavior;
use app\components\UploadBehavior;
use app\models\queries\WordQuery;
use yii\helpers\FileHelper;

class Words extends \yii\db\ActiveRecord {

    public $imageFile;

    public static function tableName() {

        return 'in_b_words';

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
                'path' => 'uploads/words',
            ],
        ];
        
    }

    public function rules() {

        return [
            [['title_ru', 'title_en', 'title_ua', 'text_ru', 'text_en', 'text_ua'], 'required'],
            [['title_ru', 'title_en', 'title_ua', 'photo'], 'string', 'max' => 250],
            [['text_ru', 'text_en', 'text_ua'], 'string'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'on' => 'create'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'on' => 'update'],
        ];

    }

    public function attributeLabels() {

        return [
            'id' => 'ID',
            'title_ru' => 'Title Ru',
            'title_en' => 'Title En',
            'title_ua' => 'Title Ua',
            'text_ru' => 'Text Ru',
            'text_en' => 'Text En',
            'text_ua' => 'Text Ua',
            'photo' => 'Image',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];

    }

    public static function findByLan() {

        $lan = Yii::$app->language;

        return self::find()->select('id, title_'.$lan.', text_'.$lan.', image')->where(['status' => 1]);
        
    }

    public function getTitle() {

        $lan = Yii::$app->language;

        $txt = 'title_'.$lan;

        return $this->$txt;

    }

    public function getText() {

        $lan = Yii::$app->language;

        $txt = 'text_'.$lan;

        return $this->$txt;

    }

    public static function find() {
        
        return new WordQuery(get_called_class());

    }

}
