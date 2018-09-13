<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "in_filter_themes_attr_parent".
 *
 * @property int $id
 * @property string $name_ru
 * @property string $name_en
 * @property string $name_ua
 * @property string $position
 */
class FilterThemesAttrParent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_filter_themes_attr_parent';
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

    public function findByLang() {

        $lan = Yii::$app->language;

        return self::find()->select('id, name_'.$lan);

    }

    public static function allList(){

        $list = self::findByLang()->all();

        return ArrayHelper::map($list, 'id', 'name');

    }

    public function getSubsEquipmentAttr(){
        return $this->hasMany(FilterMain::className(), ['theme_attr_parent_id' => 'id'])->select('theme_attr_id')->andOnCondition(['type' => 2])->joinWith('themeAttr')->andWhere(FilterThemesAttributes::tableName().'.id != :id', [':id' => 1])->groupBy('theme_attr_id')->orderBy(FilterThemesAttributes::tableName().'.position');
    }

    public function getSubsEquipmentAttrAll(){
        return FilterThemesAttributes::find()->join('JOIN', FilterMain::tableName(), FilterMain::tableName().'.theme_attr_id = '. FilterThemesAttributes::tableName(). '.id')->where(FilterMain::tableName().'.type = 2 AND '. FilterThemesAttributes::tableName(). '.id != 1')->orderBy(FilterThemesAttributes::tableName().'.position')->all();
    }

    public function getSubsServiceAttr(){
        return $this->hasMany(FilterMain::className(), ['theme_attr_parent_id' => 'id'])->select('theme_attr_id')->andOnCondition(['type' => 1])->joinWith('themeAttr')->andWhere(FilterThemesAttributes::tableName().'.id != :id', [':id' => 1])->groupBy('theme_attr_id')->orderBy(FilterThemesAttributes::tableName().'.position');
    }

    public function getSubsServiceAttrAll(){
        return FilterThemesAttributes::find()->join('JOIN', FilterMain::tableName(), FilterMain::tableName().'.theme_attr_id = '. FilterThemesAttributes::tableName(). '.id')->where(FilterMain::tableName().'.type = 1 AND '. FilterThemesAttributes::tableName(). '.id != 1')->orderBy(FilterThemesAttributes::tableName().'.position')->all();
    }

}
