<?php

namespace app\models;

use app\components\UploadBehavior;
use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "in_filter_sub_themes".
 *
 * @property int $id
 * @property string $name_ru
 * @property string $name_en
 * @property string $name_ua
 * @property string $position
 */
class FilterThemes extends ActiveRecord {

    public $imageFile;

    public static function tableName() {
        return 'in_filter_themes';
    }

    public function behaviors() {

        return [
            [
                'class' => UploadBehavior::className(),
                'imageFile' => 'imageFile',
                'photo' => 'img',
                'path' => 'uploads/FilterThemesBg',
            ],
        ];
    }

    public function rules() {
        return [
            [['name_ru', 'name_en', 'name_ua'], 'required'],
            [['name_ru', 'name_en', 'name_ua', 'img'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'on' => 'create'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'on' => 'update'],
            [['position'], 'integer'],
        ];
    }

    public function attributeLabels() {

        return [
            'id' => 'ID',
            'img' => 'Изображение темы',
            'name_ru' => 'Подтема',
            'name_en' => 'Sub theme',
            'name_ua' => 'Name Ua',
            'position' => 'position',
        ];

    }

    public function getSubsService(){
        return $this->hasMany(FilterMain::className(), ['theme_id' => 'id'])->select('tech_id')->andOnCondition(['type' => 1])->joinWith('technology')->andWhere(FilterTechnologies::tableName().'.id != :id', [':id' => 1])->groupBy('tech_id')->orderBy('position');
    }

    public function getParent(){
        return $this->hasOne(FilterMain::className(), ['theme_id' => 'id'])->select('direction_id')->joinWith('direction');
    }

    public function getSubsServiceAll(){
        return FilterTechnologies::find()->join('JOIN', FilterMain::tableName(), FilterMain::tableName().'.tech_id = '. FilterTechnologies::tableName(). '.id')->where(FilterMain::tableName().'.type = 1 AND '. FilterTechnologies::tableName(). '.id != 1')->orderBy('position')->all();
    }

    public function getSubsEquipment(){
        return $this->hasMany(FilterMain::className(), ['theme_id' => 'id'])->select('sub_theme_id')->andOnCondition(['type' => 2])->joinWith('subTheme')->andWhere(FilterSubThemes::tableName().'.id != :id', [':id' => 1])->groupBy('sub_theme_id')->orderBy('position');
    }
    public function getSubsEquipmentAll(){
        return FilterSubThemes::find()->join('JOIN', FilterMain::tableName(), FilterMain::tableName().'.sub_theme_id = '. FilterSubThemes::tableName(). '.id')->where(FilterMain::tableName().'.type = 2 AND ' . FilterSubThemes::tableName(). '.id != 1')->orderBy('position')->all();

    }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function getSubsServiceAttrParentAll(){
        return FilterThemesAttrParent::find()->join('JOIN', FilterMain::tableName(), FilterMain::tableName().'.theme_attr_parent_id = '. FilterThemesAttrParent::tableName(). '.id')->where(FilterMain::tableName().'.type = 1 AND '. FilterThemesAttrParent::tableName(). '.id != 1')->orderBy('position')->all();
    }

    public function getSubsServiceAttrParent(){
        return $this->hasMany(FilterMain::className(), ['theme_id' => 'id'])->select('theme_attr_parent_id')->andOnCondition(['type' => 1])->joinWith('themeAttrParent')->andWhere(FilterThemesAttrParent::tableName().'.id != :id', [':id' => 1])->groupBy('theme_attr_parent_id')->orderBy('position');
    }

    public function getSubsEquipmentAttrParentAll(){
        return FilterThemesAttrParent::find()->join('JOIN', FilterMain::tableName(), FilterMain::tableName().'.theme_attr_parent_id = '. FilterThemesAttrParent::tableName(). '.id')->where(FilterMain::tableName().'.type = 2 AND '. FilterThemesAttrParent::tableName(). '.id != 1')->orderBy('position')->all();
    }

    public function getSubsEquipmentAttrParent(){
        return $this->hasMany(FilterMain::className(), ['theme_id' => 'id'])->select('theme_attr_parent_id')->andOnCondition(['type' => 2])->joinWith('themeAttrParent')->andWhere(FilterThemesAttrParent::tableName().'.id != :id', [':id' => 1])->groupBy('theme_attr_parent_id')->orderBy('position');
    }

    public function getName(){

        $lan = Yii::$app->language;

        $txt = 'name_'.$lan;

        return $this->$txt;

    }

    public function findByLang() {

        $lan = Yii::$app->language;

        return self::find()->select('id, name_'.$lan);

    }

    public static function allList(){

        $list = self::findByLang()->all();

        return ArrayHelper::map($list, 'id', 'name');

    }

}
