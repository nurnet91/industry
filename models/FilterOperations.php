<?php

namespace app\models;

use app\components\TimeBehavior;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "in_filter_operations".
 *
 * @property int $id
 * @property string $name_ru
 * @property string $name_en
 * @property string $name_ua
 * @property string $position
 */
class FilterOperations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_filter_operations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_ru', 'name_en', 'name_ua'], 'required'],
            [['position'], 'integer'],
            [['name_ru', 'name_en', 'name_ua'], 'string', 'max' => 255],
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

    public function getSubsService()
    {
        return $this->hasMany(FilterMain::className(), ['operation_id' => 'id'])->select('attributes_id')->joinWith('operationAttribute')->andWhere(FilterAttributes::tableName().'.id != :id', [':id' => 1])->groupBy('attributes_id')->orderBy('position');
    }

    public function getSubsEquipment()
    {
        return $this->hasMany(FilterMain::className(), ['operation_id' => 'id'])->select('equipment_type_id')->joinWith('eType')->andWhere(FilterEquipmentTypes::tableName().'.id != :id', [':id' => 1])->groupBy('equipment_type_id')->orderBy('position');
    }


    public function getSubsEquipmentAll(){
        return FilterEquipmentTypes::find()->join('JOIN', FilterMain::tableName(), FilterMain::tableName().'.equipment_type_id = '. FilterEquipmentTypes::tableName(). '.id')->where(FilterMain::tableName().'.type = 2 AND ' . FilterEquipmentTypes::tableName(). '.id != 1')->orderBy('position')->all();

    }

    public function getSubsServiceAll(){
        return FilterAttributes::find()->join('JOIN', FilterMain::tableName(), FilterMain::tableName().'.attributes_id = '. FilterAttributes::tableName(). '.id')->where(FilterMain::tableName().'.type = 1 AND '. FilterAttributes::tableName(). '.id != 1')->orderBy('position')->all();
    }
}
