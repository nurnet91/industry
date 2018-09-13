<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "in_news_types".
 *
 * @property int $id
 * @property string $name_ru
 * @property string $name_ua
 * @property string $name_en
 * @property int $position
 */
class NewsTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_news_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['position'], 'integer'],
            [['name_ru', 'name_ua', 'name_en'], 'string', 'max' => 255],
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
            'name_ua' => 'Name Ua',
            'name_en' => 'Name En',
            'position' => 'Position',
        ];
    }
    public static function findForMain() {

        $lan = Yii::$app->language;

        return self::find()->select(['id', 'name_'.$lan,'position']);

    }
    public static  function findForMainOne($id){
        $lan = Yii::$app->language;
        return ArrayHelper::map(self::find()->andWhere(['id'=>$id])->limit(1)->all(), 'id', 'name_'.$lan);

    }

    public static function findForMainList() {
        $lan = Yii::$app->language;
        return ArrayHelper::map(self::findForMain()->orderBy('position')->all(), 'id', 'name_'.$lan);

    }

    public static function findByLan() {

        $lan = Yii::$app->language;

        return self::find()->select(['id', 'name_'. $lan]);

    }


    public function getName() {

        $lan = Yii::$app->language;

        $txt = 'name_'.$lan;

        return $this->$txt;

    }
}
