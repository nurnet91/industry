<?php

namespace app\models;

use Yii;
use app\components\TimeBehavior;
use yii\helpers\ArrayHelper;

class Messages extends \yii\db\ActiveRecord {

    const TYPES = [
        0 => 'некому',
        1 => 'всем',
        2 => 'индивидуально',
        3 => 'М/Ж',
        4 => 'по городу',
    ];

    public $this_id;

    public static function tableName() {

        return 'in_messages';

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
            [['user_id', 'title', 'text'], 'required'],
            [['user_id', 'status', 'type', 'sended', 'this_id'], 'integer'],
            [['text'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 250],
        ];

    }

    public function attributeLabels() {

        return [
            'id' => 'ID',
            'user_id' => 'Author',
            'type' => 'Send message',
            'title' => 'Title',
            'text' => 'Text',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
            'sended' => 'Sended',
            'this_id' => 'Choose message (if empty will be saved as new message)',
        ];

    }

    public function getUser() {

        return $this->hasOne(Users::className(), ['id' => 'user_id']);

    }

    public static function findList() {

        $models = self::find()->select(['id', 'title'])->where(['status' => 1])->all();

        $data = ArrayHelper::map($models, 'id', 'title');
        
        return $data;
        
    }

    public static function findActive() {

        return self::find()->where(['status' => 1]);

    }
    
}
