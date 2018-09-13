<?php

namespace app\models;

use Yii;
use app\components\TimeBehavior;

class Mailer extends \yii\db\ActiveRecord {

    const USER = 1;
    const SUBSCRIBER = 2;
    const OFFER = 3;
    public $cat_ids = [];

    protected static $user_roles = [
        1 => 'USER',
        2 => 'SUBSCRIBER',
        3 => 'OFFER',
    ];

    public static function tableName() {

        return 'in_mailer';

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
            [['user_id', 'user_group_id'], 'required'],
            [['user_id', 'status', 'user_group_id', 'user_type'], 'integer'],
            [['created_at', 'updated_at', 'cat_ids'], 'safe'],
        ];

    }

    public function attributeLabels() {

        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
            'user_group_id' => 'User Group ID',
            'user_type' => 'User type',
        ];

    }

    public static function byType($type) {

        if (array_key_exists($type, self::$user_roles)) {

            return self::$user_roles[$type];

        }

        return self::$user_roles[self::USER];

    }

    public static function types() {

        $roles = self::$user_roles;

        return $roles;

    }

    public function getUsers() {

        return $this->hasOne(Users::className(), ['id' => 'user_id']);

    }

    public function getSubscribers() {

        return $this->hasOne(Subscribers::className(), ['id' => 'user_id']);

    }

}
