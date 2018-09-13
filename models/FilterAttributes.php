<?php

namespace app\models;

use app\components\TimeBehavior;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "in_filter_attributes".
 *
 * @property int $id
 * @property string $name_ru
 * @property string $name_en
 * @property string $name_ua
 * @property string $position
 */
class FilterAttributes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_filter_attributes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_ru', 'name_en', 'name_ua'], 'required'],
            [['name_ru', 'name_en', 'name_ua'], 'string', 'max' => 255],
            [['position'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_ru' => 'Name Ru',
            'name_en' => 'Name En',
            'name_ua' => 'Name Ua',
            'position' => 'position',
        ];
    }

    public function getName(){
        $lan = Yii::$app->language;

        $txt = 'name_'.$lan;

        return $this->$txt;
    }

    public function findByLang()
    {
        $lan = Yii::$app->language;
        return self::find()->select('id, name_'.$lan);
    }

    public static function allList(){
        $list = self::findByLang()->all();
        return ArrayHelper::map($list, 'id', 'name');
    }
    public function getFilterMain(){
        return $this->hasMany(FilterMain::className(),['attributes_id'=>'id']);
    }
}
