<?php

namespace app\models;

use Yii;
use app\components\TimeBehavior;
use app\components\UploadBehavior;

class NewNews extends \yii\db\ActiveRecord {

    public $imageFile;
    
    public static function tableName() {

        return 'in_new_news';

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
                'path' => 'uploads/new-news',
            ],

        ];
        
    }

    public function rules() {

        return [
            [['category_id', 'title_ru', 'title_en', 'title_ua'], 'required'],
            [['category_id', 'type', 'status'], 'integer'],
            [['short_text_ru', 'short_text_en', 'short_text_ua', 'text_ru', 'text_en', 'text_ua'], 'string'],
            [['photo', 'title_ru', 'title_en', 'title_ua', 'link'], 'string', 'max' => 255],
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
            'type'          => 'Type',
            'title_ru'      => 'Title Ru',
            'title_en'      => 'Title En',
            'title_ua'      => 'Title Ua',
            'short_text_ru' => 'Short Text Ru',
            'short_text_en' => 'Short Text En',
            'short_text_ua' => 'Short Text Ua',
            'text_ru'       => 'Text Ru',
            'text_en'       => 'Text En',
            'text_ua'       => 'Text Ua',
            'link'          => 'Link',
            'created_at'    => 'Created At',
            'updated_at'    => 'Updated At',
            'status'        => 'Status',
            'imageFile'     => 'Image',
        ];

    }

}
