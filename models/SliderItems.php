<?php

namespace app\models;

use app\components\TimeBehavior;
use app\components\UploadBehavior;
use Yii;

/**
 * This is the model class for table "in_slider_items".
 *
 * @property int $id
 * @property string $photo
 * @property string $title_ru
 * @property string $title_en
 * @property string $title_ua
 */
class SliderItems extends \yii\db\ActiveRecord
{
    public $imageFile;

    public function behaviors() {

        return [
            [
                'class' => TimeBehavior::className(),
            ],
            [
                'class' => UploadBehavior::className(),
                'imageFile' => 'imageFile',
                'photo' => 'photo',
                'path' => 'uploads/slider',
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_slider_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_ru', 'title_en', 'title_ua'], 'required'],
            [['status'], 'integer'],
            [['photo', 'title_ru', 'title_en', 'title_ua'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'on' => 'create'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'on' => 'update'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'photo' => 'Photo',
            'title_ru' => 'Title ru',
            'title_en' => 'Title en',
            'title_ua' => 'Title ua',
        ];
    }

    public function getTitle(){

        $lan = Yii::$app->language;

        $txt = 'title_'.$lan;

        return $this->$txt;

    }

}
