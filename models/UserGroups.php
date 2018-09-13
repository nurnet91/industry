<?php

namespace app\models;

use Yii;
use app\components\TimeBehavior;
use yii\helpers\ArrayHelper;

class UserGroups extends \yii\db\ActiveRecord {

    public static function tableName() {

        return 'in_user_groups';

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
            [['name'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];

    }

    public function attributeLabels() {

        return [
            'id' => 'ID',
            'name' => 'Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];

    }

    public static function selectList() {

        $list = self::find()->select(['id', 'name'])->all();

        return ArrayHelper::map($list, 'id', 'name');

    }

}
