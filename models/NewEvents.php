<?php

namespace app\models;

use Yii;
use app\components\TimeBehavior;
use app\components\UploadBehavior;

class NewEvents extends \yii\db\ActiveRecord {

    public $imageFile;

    public static function tableName() {

        return 'in_new_events';

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
                'path' => 'uploads/new-events',
            ],

        ];
        
    }

    public function rules() {

        return [
            [['category_id', 'title_ru', 'title_ua', 'title_en'], 'required'],
            [['category_id', 'status'], 'integer'],
            [['text_ru', 'text_en', 'text_ua'], 'string'],
            [['photo', 'title_ru', 'title_ua', 'title_en', 'adres'], 'string', 'max' => 255],
            [['created_at', 'updated_at'], 'safe'],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'on' => 'create'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'on' => 'update'],
        ];

    }

    public function attributeLabels() {

        return [
            'id'            => 'ID',
            'category_id'   => 'Category ID',
            'photo'         => 'Photo',
            'title_ru'      => 'Title Ru',
            'title_ua'      => 'Title Ua',
            'title_en'      => 'Title En',
            'text_ru'       => 'Text Ru',
            'text_en'       => 'Text En',
            'text_ua'       => 'Text Ua',
            'adres'         => 'Adres',
            'created_at'    => 'Created At',
            'updated_at'    => 'Updated At',
            'status'        => 'Status',
            'imageFile'     => 'Image',
        ];

    }

}
