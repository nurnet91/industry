<?php

namespace app\models;

use Yii;

class UserMessages extends \yii\db\ActiveRecord {

    public static function tableName() {

        return 'in_user_messages';

    }

    public function rules() {

        return [
            [['user_id', 'message_id'], 'required'],
            [['user_id', 'message_id', 'readed'], 'integer'],
            [['created_at'], 'safe'],
        ];

    }

    public function attributeLabels() {

        return [
            'id' => 'ID',
            'user_id' => 'User',
            'message_id' => 'Message',
            'created_at' => 'Created At',
            'readed' => 'Readed',
        ];

    }

    public function beforeSave($insert) {

        if (parent::beforeSave($insert)) {

            if ($this->isNewRecord) {

                $this->readed = 0;

            }

            return true;
            
        }

        return false;

    }

    public function getUser() {

        return $this->hasOne(Users::className(), ['id' => 'user_id']);

    }

    public function getMessage() {

        return $this->hasOne(Messages::className(), ['id' => 'message_id']);

    }

    public function takeDate() {

        $date = date("d/m/Y",strtotime($this->created_at));

        return $date;
        
    }

}
