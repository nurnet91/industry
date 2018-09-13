<?php

namespace app\models;

use app\components\TimeBehavior;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "in_filter_technologies".
 *
 * @property int $id
 * @property string $name_ru
 * @property string $name_en
 * @property string $name_ua
 * @property string $position
 */
class FilterTechnologies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_filter_technologies';
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

    public function getSubs(){
        return $this->hasMany(FilterMain::className(), ['tech_id' => 'id'])->select('operation_id')->joinWith('operation')->andWhere(FilterOperations::tableName().'.id != :id', [':id' => 1])->groupBy('operation_id')->orderBy('position');
    }


    public function getSubsAll()
    {
        return FilterOperations::find()->join('JOIN', FilterMain::tableName(), FilterMain::tableName().'.operation_id = '. FilterOperations::tableName(). '.id')->where(FilterOperations::tableName(). '.id != 1')->orderBy('position')->all();
    }

}
