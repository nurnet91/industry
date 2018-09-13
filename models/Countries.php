<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

class Countries extends \yii\db\ActiveRecord {

    public static function tableName() {

        return 'in_a_countries';

    }

    public function rules() {

        return [
            [['name_ru', 'name_en', 'name_ua'], 'required'],
            [['name_ru', 'name_en', 'name_ua'], 'string', 'max' => 250],
            [['status'], 'integer'],
        ];

    }

    public function attributeLabels() {

        return [
            'id' => 'ID',
            'name_ru' => 'Name Ru',
            'name_en' => 'Name En',
            'name_ua' => 'Name Ua',
            'status' => 'Status',
        ];

    }

    public function getName() {

        $lan = Yii::$app->language;

        $txt = 'name_'.$lan;

        return $this->$txt;

    }

    public function getRegions() {

        return $this->hasMany(Regions::className(), ['country_id' => 'id']);
        
    }

    public function getCities() {

        return $this->hasMany(Cities::className(), ['country_id' => 'id']);
        
    }

    public static function selectList() {

        $list = self::find()->select(['id', 'name_ru'])->where(['status' => 1])->all();

        return ArrayHelper::map($list, 'id', 'name_ru');
        
    }

    public function listRegions() {
        $regions = $this->regions;
        return ArrayHelper::map($regions, 'id', 'name_ru');
    }

    public function listCities() {
        $cities = $this->cities;
        return ArrayHelper::map($cities, 'id', 'name_ru');
    }
    public function __toString()
    {
        $lan = Yii::$app->language;

        $txt = 'name_'.$lan;

        return $this->$txt;
    }

}
