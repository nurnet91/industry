<?php

namespace app\models;

use Yii;
use app\models\queries\FaqsQuery;

class Faqs extends \yii\db\ActiveRecord {
    
    public static function tableName() {

        return 'in_b_faqs';

    }

    public function rules() {

        return [
            [['question', 'answer'], 'required'],
            [['question', 'answer'], 'string'],
            [['status'], 'integer'],
            [['created_at'], 'safe'],
        ];

    }

    public function attributeLabels() {

        return [
            'id' => 'ID',
            'question' => 'Question',
            'answer' => 'Answer',
            'created_at' => 'Created At',
            'status' => 'Status',
        ];

    }

    public static function find() {
        
        return new FaqsQuery(get_called_class());

    }

}
