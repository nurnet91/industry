<?php

namespace app\models;

use Yii;
use app\components\TimeBehavior;
use yii\helpers\ArrayHelper;

class Subscribers extends \yii\db\ActiveRecord {

    public $cat_ids = [];

    public static function tableName() {

        return 'in_subscribers';
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
            [['name', 'email'], 'required'],
            [['phone', 'info_inform', 'info_special', 'info_offer'], 'integer'],
            [['created_at', 'updated_at', 'cat_ids', 'status'], 'safe'],
            [['name', 'email', 'category_ids'], 'string', 'max' => 255],
        ];

    }

    public function attributeLabels() {

        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'info_inform' => 'Info Inform',
            'info_special' => 'Info Special',
            'info_offer' => 'Info Offer',
            'category_ids' => 'Categories',
            'cat_ids' => 'Categories',
            'status' => 'Status',
        ];

    }

    public static function allSubscribersToList() {

        $list = self::find()->select(['id', 'email'])->all();

        return ArrayHelper::map($list, 'id', 'email');

    }

}
