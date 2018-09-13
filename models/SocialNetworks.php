<?php

namespace app\models;

use Yii;
use app\components\TimeBehavior;
use app\components\UploadBehavior;
use yii\helpers\FileHelper;

class SocialNetworks extends \yii\db\ActiveRecord {

    public $imageFile;

    public static function tableName() {

        return 'in_social_networks';

    }

    public function behaviors() {

        return [
            [
                'class' => TimeBehavior::className(),
            ],
            [
                'class' => UploadBehavior::className(),
                'imageFile' => 'imageFile',
                'photo' => 'social_icon',
                'path' => 'uploads/social_icons',
            ],
        ];
        
    }

    public function rules() {

        return [
            [['name', 'url'], 'required'],
            [['status', 'norder', 'on_widgets'], 'integer'],
            [['name', 'url', 'social_icon'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'on' => 'create'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'on' => 'update'],
            [['created_at', 'updated_at', 'widget_content'], 'safe'],
        ];

    }

    public function attributeLabels() {

        return [
            'id' => 'ID',
            'name' => 'Name',
            'url' => 'Url',
            'social_icon' => 'Social icon',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'widget_content' => 'Widget content',
            'on_widgets' => 'Show on widgets',
            'norder' => 'Order',
        ];
    }

}
