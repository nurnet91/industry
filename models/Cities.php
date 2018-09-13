<?php

namespace app\models;

use Yii;

class Cities extends \yii\db\ActiveRecord {

    public static function tableName() {

        return 'in_a_cities';

    }

    public function rules() {

        return [
            [['name_ru', 'name_en', 'name_ua'], 'required'],
            [['country_id'], 'required', 'whenClient' => "function (attribute, value) {return false;}"],
            [['country_id', 'status'], 'integer'],
            [['name_ru', 'name_en', 'name_ua'], 'string', 'max' => 250],
        ];

    }

    public function attributeLabels() {

        return [
            'id' => 'ID',
            'country_id' => 'Country ID',
            'name_ru' => 'Name Ru',
            'name_en' => 'Name En',
            'name_ua' => 'Name Ua',
            'status' => 'Status',
        ];

    }

    public function getCountry() {

        return $this->hasOne(Countries::className(), ['id' => 'country_id']);
        
    }

}
