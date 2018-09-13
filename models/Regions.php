<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

class Regions extends \yii\db\ActiveRecord {

    public static function tableName() {

        return 'in_a_regions';

    }

    public function rules() {

        return [
            [['name_ru', 'name_en', 'name_ua'], 'required'],
            [['country_id'], 'required', 'whenClient' => "function (attribute, value) {return false;}"],
            [['country_id', 'status'], 'integer'],
            [['name_ru', 'name_en', 'name_ua'], 'string', 'max' => 100],
        ];

    }

    public function attributeLabels() {

        return [
            'id' => 'ID',
            'name_ru' => 'Name Ru',
            'name_en' => 'Name En',
            'name_ua' => 'Name Ua',
            'country_id' => 'Country ID',
            'status' => 'Status',
        ];

    }

    public function getCountry() {

        return $this->hasOne(Countries::className(), ['id' => 'country_id']);
        
    }
    public function getCities() {
        return $this->hasMany(Cities::className(), ['country_id' => 'id']);
    }

    public function getName() {

        $lan = Yii::$app->language;

        $txt = 'name_'.$lan;

        return $this->$txt;

    }
    
    public static function findByCountry($country_id = 0) {

        $lan = Yii::$app->language;

        $list = self::find()->select(['id', 'name_'.$lan])->where(['status' => 1, 'country_id' => $country_id])->all();

        return ArrayHelper::map($list, 'id', 'name_'.$lan);

    }
    public function __toString()
    {
        $lan = Yii::$app->language;

        $txt = 'name_'.$lan;

        return $this->$txt;
    }

}
