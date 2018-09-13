<?php

namespace app\models;

use app\components\TimeBehavior;
use Yii;

/**
 * This is the model class for table "in_slider_titles".
 *
 * @property int $id
 * @property string $title_ru
 * @property string $title_en
 * @property string $title_ua
 */
class SliderTitles extends \yii\db\ActiveRecord
{

    public function behaviors() {

        return [
            [
                'class' => TimeBehavior::className(),
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_slider_titles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_ru', 'title_en', 'title_ua'], 'required'],
            [['title_ru', 'title_en', 'title_ua'], 'string', 'max' => 255],
            [['status'], 'integer'],
            [['created_at', 'updated_at', 'news_count'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title_ru' => 'Title Ru',
            'title_en' => 'Title En',
            'title_ua' => 'Title Ua',
        ];
    }

    public function getTitle(){

        $lan = Yii::$app->language;

        $txt = 'title_'.$lan;

        return $this->$txt;

    }
}
