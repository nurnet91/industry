<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

class Referals extends \yii\db\ActiveRecord {

    public static function tableName() {

        return 'in_referals';

    }

    public function rules() {

        return [
            [['name_ru', 'name_en', 'name_ua'], 'required'],
            [['status'], 'integer'],
            [['created_at'], 'safe'],
            [['name_ru', 'name_en', 'name_ua'], 'string', 'max' => 250],
        ];

    }

    public function attributeLabels() {

        return [
            'id' => 'ID',
            'name_ru' => 'Name Ru',
            'name_en' => 'Name En',
            'name_ua' => 'Name Ua',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];

    }

    public static function allList() {

        $lan = Yii::$app->language;

        $txt = 'name_'.$lan;

        $models = self::find()->select(['id', $txt])->where(['status' => 1])->all();

        return ArrayHelper::map($models, 'id', $txt);

    }

    public function getName() {

        $lan = Yii::$app->language;

        $txt = 'name_'.$lan;

        return $this->$txt;
        
    }

}
