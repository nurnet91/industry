<?php

namespace app\models;

use app\components\TimeBehavior;
use app\components\UploadBehavior;
use Yii;
use yii\base\Theme;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "in_filter_main".
 *
 * @property int $id
 * @property int $direction_id
 * @property int $theme_id
 * @property int $theme_attr_parent_id
 * @property int $theme_attr_id
 * @property int $sub_theme_id
 * @property int $tech_id
 * @property int $operation_id
 * @property int $equipment_type_id
 * @property int $equipment_manufacturer_id
 * @property int $attributes_id
 * @property int $type
 * @property int $theme_attribute
 * @property int $status
 * @property int $show_anywhere
 * @property string $created_at
 * @property string $updated_at
 */
class FilterMain extends ActiveRecord
{

    const TYPE_SERVICE = 1;
    const TYPE_EQUIPMENT = 2;

    protected static $types = [
        1 => 'TYPE_SERVICE',
        2 => 'TYPE_EQUIPMENT',
    ];

    public static function types() {
        return self::$types;
    }

    public static function tableName()
    {
        return 'in_filter_main';
    }

    public function behaviors() {

        return [
            [
                'class' => TimeBehavior::className(),
            ],
        ];
    }

    public function rules()
    {
        return [
            [['direction_id', 'type', 'theme_attribute'], 'required'],
            [['direction_id', 'theme_id', 'theme_attr_parent_id', 'theme_attr_id', 'sub_theme_id', 'tech_id', 'operation_id', 'equipment_type_id', 'equipment_manufacturer_id', 'attributes_id', 'type', 'status', 'theme_attribute', 'show_anywhere'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'direction_id' => 'Направление',
            'theme_id' => 'Тема',
            'theme_attr_parent_id' => 'Список признаков',
            'theme_attr_id' => 'Признак темы',
            'sub_theme_id' => 'Подтема',
            'tech_id' => 'Технология',
            'operation_id' => 'Операции',
            'equipment_type_id' => 'Тип оборудования',
            'equipment_manufacturer_id' => 'Производитель',
            'attributes_id' => 'Признак операции',
            'type' => 'Type',
            'theme_attribute' => '',
            'status' => 'Status',
            'show_anywhere' => 'Show anywhere',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public function getDirection() {
        return $this->hasOne(Directions::className(), ['id' => 'direction_id']);
    }

    public function getTheme() {
        return $this->hasOne(FilterThemes::className(), ['id' => 'theme_id']);
    }

    public function getThemeAttr() {
        return $this->hasOne(FilterThemesAttributes::className(), ['id' => 'theme_attr_id']);
    }

    public function getThemeAttrParent() {
        return $this->hasOne(FilterThemesAttrParent::className(), ['id' => 'theme_attr_parent_id']);
    }

    public function getSubTheme() {
        return $this->hasOne(FilterSubThemes::className(), ['id' => 'sub_theme_id']);
    }

    public function getTechnology() {
        return $this->hasOne(FilterTechnologies::className(), ['id' => 'tech_id']);
    }

    public function getOperation() {
        return $this->hasOne(FilterOperations::className(), ['id' => 'operation_id']);
    }

    public function getEType() {
        return $this->hasOne(FilterEquipmentTypes::className(), ['id' => 'equipment_type_id']);
    }

    public function getEManufacturer() {
        return $this->hasOne(FilterEquipmentManufacturers::className(), ['id' => 'equipment_manufacturer_id']);
    }

    public function getOperationAttribute() {
        return $this->hasOne(FilterAttributes::className(), ['id' => 'attributes_id']);
    }

    public static function AllPosition($id) {
        return FilterMain::find()->joinWith(['theme', 'themeAttr', 'themeAttrParent', 'subTheme', 'subTheme', 'technology', 'operation', 'eType', 'eManufacturer', 'operationAttribute'])->where([self::tableName().'.id' => $id])->all();
    }

    public static function allList() {
        return FilterMain::find()->select('direction_id')->joinWith('direction')->select('direction_id, theme_id')->joinWith('theme')->distinct(true)->all();
    }
}
