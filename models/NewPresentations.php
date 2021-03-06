<?php

namespace app\models;

use Yii;
use app\components\TimeBehavior;
use app\components\UploadBehavior;

class NewPresentations extends \yii\db\ActiveRecord {

    public $imageFile;

    public static function tableName() {

        return 'in_new_presentations';

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
                'path' => 'uploads/new-presentations',
            ],

        ];
        
    }

    public function rules() {

        return [
            [['title_ru', 'title_ua', 'title_en', 'category_id'], 'required'],
            [['text_ru', 'text_en', 'text_ua'], 'string'],
            [['status', 'integer'], 'integer'],
            [['photo', 'title_ru', 'title_ua', 'title_en'], 'string', 'max' => 255],
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
            'created_at'    => 'Created At',
            'updated_at'    => 'Updated At',
            'status'        => 'Status',
            'imageFile'     => 'Image',
        ];

    }
    
}
