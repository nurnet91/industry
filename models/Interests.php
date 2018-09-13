<?php

namespace app\models;

use Yii;
use app\components\TimeBehavior;

class Interests extends \yii\db\ActiveRecord {

    public static function tableName() {

        return 'in_interests';

    }

    public function behaviors() {

        return [
            [
                'class' => TimeBehavior::className(),
            ],
        ];
        
    }

    public function rules() {

        return [
            [['user_id', 'category_id'], 'required'],
            [['user_id', 'category_id', 'status', 'favorites', 'read_later'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
        ];

    }

    public function attributeLabels() {

        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'category_id' => 'Category ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
            'favorites' => 'Favorites',
            'read_later' => 'Read Later',
        ];

    }

    public function getUser() {
        
        return $this->hasOne(Users::className(), ['user_id' => 'id']);
        
    }

}
