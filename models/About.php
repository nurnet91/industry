<?php

namespace app\models;

use Yii;
use app\components\TimeBehavior;
use app\components\UploadBehavior;
use app\models\queries\AboutQuery;

class About extends \yii\db\ActiveRecord {

    public $imageFile;

    public static function tableName() {

        return 'in_b_about';

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
                'path' => 'uploads/about',
            ],

        ];
        
    }

    public function rules() {

        return [
            [['text_ru', 'text_en', 'text_ua'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['status', 'norder'], 'integer'],
            [['photo', 'link', 'author_ru', 'author_en', 'author_ua'], 'string', 'max' => 250],
            [['dolz_ru', 'dolz_en', 'dolz_ua'], 'string', 'max' => 100],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'on' => 'create'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'on' => 'update'],
        ];

    }

    public function attributeLabels() {

        return [
            'id' => 'ID',
            'photo' => 'Photo',
            'text_ru' => 'Text Ru',
            'text_en' => 'Text En',
            'text_ua' => 'Text Ua',
            'link' => 'Link',
            'author_ru' => 'Author Ru',
            'author_en' => 'Author En',
            'author_ua' => 'Author Ua',
            'dolz_ru' => 'Dolz Ru',
            'dolz_en' => 'Dolz En',
            'dolz_ua' => 'Dolz Ua',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
            'norder' => 'Order',
            'imageFile' => 'Image',
        ];

    }

    public function getText() {

        $lan = Yii::$app->language;

        $txt = 'text_'.$lan;

        return $this->$txt;

    }

    public function getAuthor() {

        $lan = Yii::$app->language;

        $txt = 'author_'.$lan;

        return $this->$txt;

    }

    public function getDolz() {

        $lan = Yii::$app->language;

        $txt = 'dolz_'.$lan;

        return $this->$txt;

    }

    public static function find() {
        
        return new AboutQuery(get_called_class());

    }

}
