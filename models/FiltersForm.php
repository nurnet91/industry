<?php

namespace app\models;

use Yii;
use yii\base\Model;

class FiltersForm extends Model {

    public $direction_id;
    public $type;

    public $ThemesInput_ru;
    public $ThemesInput_en;
    public $ThemesInput_ua;

    public $Direction_pos;
    public $Theme_pos;

    public $ThemesAttrInput_ru;
    public $ThemesAttrInput_en;
    public $ThemesAttrInput_ua;

    public $ThemeAttr_pos;

    public $ThemesAttrParentInput_ru;
    public $ThemesAttrParentInput_en;
    public $ThemesAttrParentInput_ua;

    public $ThemeAttrParent_pos;

    public $SubThemesInput_ru;
    public $SubThemesInput_en;
    public $SubThemesInput_ua;

    public $SubTheme_pos;

    public $TechInput_ru;
    public $TechInput_en;
    public $TechInput_ua;

    public $Tech_pos;

    public $OperationsInput_ru;
    public $OperationsInput_en;
    public $OperationsInput_ua;

    public $Operation_pos;

    public $E_TypeInput_ru;
    public $E_TypeInput_en;
    public $E_TypeInput_ua;

    public $EType_pos;

    public $ManufacturerInput_ru;
    public $ManufacturerInput_en;
    public $ManufacturerInput_ua;

    public $Manufacturer_pos;

    public $AttributesInput_ru;
    public $AttributesInput_en;
    public $AttributesInput_ua;

    public $Attributes_pos;

    public $status;
    public $show_anywhere;

    public function rules()
    {
        return [

            [['direction_id', 'type'], 'required'],
            [['ThemesInput_ru', 'ThemesInput_en', 'ThemesInput_ua'], 'required',
                'when' => function($m){
                    return (!empty($m->ThemesInput_ru) || !empty($m->ThemesInput_en) || !empty($m->ThemesInput_ua));
                },
                'whenClient' => "function (attribute, value) {
                    return ($('#ThemesInput_ru').val().length || $('#ThemesInput_en').val().length || $('#ThemesInput_ua').val().length);
                }"],

            [['ThemesAttrInput_ru', 'ThemesAttrInput_en', 'ThemesAttrInput_ua'], 'required',
                'when' => function($m){
                    return (!empty($m->ThemesAttrInput_ru) || !empty($m->ThemesAttrInput_en) || !empty($m->ThemesAttrInput_ua));
                },
                'whenClient' => "function (attribute, value) {
                    return ($('#ThemesAttrInput_ru').val().length || $('#ThemesAttrInput_en').val().length || $('#ThemesAttrInput_ua').val().length);
                }"],

            [['ThemesAttrParentInput_ru', 'ThemesAttrParentInput_en', 'ThemesAttrParentInput_ua'], 'required',
                'when' => function($m){
                    return (!empty($m->ThemesAttrParentInput_ru) || !empty($m->ThemesAttrParentInput_en) || !empty($m->ThemesAttrParentInput_ua));
                },
                'whenClient' => "function (attribute, value) {
                    return ($('#ThemesAttrParentInput_ru').val().length || $('#ThemesAttrParentInput_en').val().length || $('#ThemesAttrParentInput_ua').val().length);
                }"],

            [['SubThemesInput_ru', 'SubThemesInput_en', 'SubThemesInput_ua'], 'required',
                'when' => function($m){
                    return (!empty($m->SubThemesInput_ru) || !empty($m->SubThemesInput_en) || !empty($m->SubThemesInput_ua));
                },
                'whenClient' => "function (attribute, value) {
                    return ($('#SubThemesInput_ru').val().length || $('#SubThemesInput_en').val().length || $('#SubThemesInput_ua').val().length);
                }"],
            [['TechInput_ru', 'TechInput_en', 'TechInput_ua'], 'required',
                'when' => function($m){
                    return (!empty($m->TechInput_ru) || !empty($m->TechInput_en) || !empty($m->TechInput_ua));
                },
                'whenClient' => "function (attribute, value) {
                    return ($('#ThemeTechInput_ru').val().length || $('#ThemeTechInput_en').val().length || $('#ThemeTechInput_ua').val().length);
                }"],
            [['OperationsInput_ru', 'OperationsInput_en', 'OperationsInput_ua'], 'required',
                'when' => function($m){
                    return (!empty($m->OperationsInput_ru) || !empty($m->OperationsInput_en) || !empty($m->OperationsInput_ua));
                },
                'whenClient' => "function (attribute, value) {
                    return ($('#TechOperationsInput_ru').val().length || $('#TechOperationsInput_en').val().length || $('#TechOperationsInput_ua').val().length);
                }"],
            [['E_TypeInput_ru', 'E_TypeInput_en', 'E_TypeInput_ua'], 'required',
                'when' => function($m){
                    return (!empty($m->E_TypeInput_ru) || !empty($m->E_TypeInput_en) || !empty($m->E_TypeInput_ua));
                },
                'whenClient' => "function (attribute, value) {
                    return ($('#EquipmentTypeInput_ru').val().length || $('#EquipmentTypeInput_en').val().length || $('#EquipmentTypeInput_ua').val().length);
                }"],
            [['ManufacturerInput_ru', 'ManufacturerInput_en', 'ManufacturerInput_ua'], 'required',
                'when' => function($m){
                    return (!empty($m->ManufacturerInput_ru) || !empty($m->ManufacturerInput_en) || !empty($m->ManufacturerInput_ua));
                },
                'whenClient' => "function (attribute, value) {
                    return ($('#EquipmentManufacturerInput_ru').val().length || $('#EquipmentManufacturerInput_en').val().length || $('#EquipmentManufacturerInput_ua').val().length);
                }"],
            [['AttributesInput_ru', 'AttributesInput_en', 'AttributesInput_ua'], 'required',
                'when' => function($m){
                    return (!empty($m->AttributesInput_ru) || !empty($m->AttributesInput_en) || !empty($m->AttributesInput_ua));
                },
                'whenClient' => "function (attribute, value) {
                    return ($('#OperationAttributesInput_ru').val().length || $('#OperationAttributesInput_en').val().length || $('#OperationAttributesInput_ua').val().length);
                }"],

            [[
                'ThemesInput_ru', 'ThemesInput_en', 'ThemesInput_ua',
                'ThemesAttrInput_ru', 'ThemesAttrInput_en', 'ThemesAttrInput_ua',
                'ThemesAttrParentInput_ru', 'ThemesAttrParentInput_en', 'ThemesAttrParentInput_ua',
                'SubThemesInput_ru','SubThemesInput_en','SubThemesInput_ua',
                'TechInput_ru','TechInput_en','TechInput_ua',
                'OperationsInput_ru','OperationsInput_en','OperationsInput_ua',
                'E_TypeInput_ru','E_TypeInput_en','E_TypeInput_ua',
                'ManufacturerInput_ru','ManufacturerInput_en','ManufacturerInput_ua',
                'AttributesInput_ru','AttributesInput_en','AttributesInput_ua'], 'string', 'max' => 255],
            [[
                'Direction_pos',
                'Operation_pos',
                'Theme_pos',
                'ThemeAttr_pos',
                'ThemeAttrParent_pos',
                'SubTheme_pos',
                'Tech_pos',
                'EType_pos',
                'Manufacturer_pos',
                'Attributes_pos',
            ], 'integer']
        ];
    }

    public function attributeLabels()
    {
        return [
            'ThemesInput_ru' => 'Тема',
            'ThemesInput_en' => 'Theme',
            'ThemesInput_ua' => 'Theme UA',

            'ThemesAttrInput_ru' => 'Признак темы',
            'ThemesAttrInput_en' => 'Theme attribute',
            'ThemesAttrInput_ua' => 'Theme attribute UA',

            'ThemesAttrParentInput_ru' => 'Имя списка признака темы',
            'ThemesAttrParentInput_en' => 'Theme attr list name',
            'ThemesAttrParentInput_ua' => 'Theme attr list name UA',

            'SubThemesInput_ru' => 'Подтема',
            'SubThemesInput_en' => 'Sub theme',
            'SubThemesInput_ua' => 'Sub theme UA',

            'TechInput_ru' => 'Технология',
            'TechInput_en' => 'Technology',
            'TechInput_ua' => 'Technology UA',

            'OperationsInput_ru' => 'Операции',
            'OperationsInput_en' => 'Operation',
            'OperationsInput_ua' => 'Operation UA',

            'Direction_pos' => '#',
            'Operation_pos' => '#',
            'Theme_pos' => '#',
            'ThemeAttr_pos' => '#',
            'ThemeAttrParent_pos' => '#',
            'SubTheme_pos' => '#',
            'Tech_pos' => '#',
            'EType_pos' => '#',
            'Manufacturer_pos' => '#',
            'Attributes_pos' => '#',

            'E_TypeInput_ru' => 'Тип оборудования',
            'E_TypeInput_en' => 'Equipment types',
            'E_TypeInput_ua' => 'Equipment types UA',

            'ManufacturerInput_ru' => 'Производитель',
            'ManufacturerInput_en' => 'Equipment manufacturer',
            'ManufacturerInput_ua' => 'Equipment manufacturer UA',

            'AttributesInput_ru' => 'Признак операции',
            'AttributesInput_en' => 'Operation attributes',
            'AttributesInput_ua' => 'Operation attributes UA'
        ];
    }
}
