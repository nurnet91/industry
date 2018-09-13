<?php

namespace app\models;

use app\components\TimeBehavior;
use Yii;

/**
 * This is the model class for table "in_advices".
 *
 * @property int $id
 * @property string $title_ru
 * @property string $title_en
 * @property string $title_ua
 * @property string $text_ru
 * @property string $text_en
 * @property string $text_ua
 * @property string $created_at
 * @property string $updated_at
 * @property int $status
 */
class Advices extends \yii\db\ActiveRecord
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
        return 'in_advices';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_ru', 'title_en', 'title_ua', 'text_ru', 'text_en', 'text_ua'], 'required'],
            [['status'], 'integer'],
            [['text_ru', 'text_en', 'text_ua'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['title_ru', 'title_en', 'title_ua'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'title_ru' => 'Title Ru',
            'title_en' => 'Title En',
            'title_ua' => 'Title Ua',
            'text_ru' => 'Text Ru',
            'text_en' => 'Text En',
            'text_ua' => 'Text Ua',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }

    public function getTitle() {

        $lan = Yii::$app->language;

        $txt = 'title_'.$lan;

        return $this->$txt;

    }

    public function getText() {

        $lan = Yii::$app->language;

        $txt = 'text_'.$lan;

        return $this->$txt;

    }

}
