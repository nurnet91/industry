<?php

namespace app\models;

use Yii;
use app\components\TimeBehavior;
use app\components\UploadBehavior;
use app\models\queries\ReviewQuery;
use yii\db\ActiveRecord;

class Reviews extends ActiveRecord {

    const POSITION_LEFT = 1;
    const POSITION_RIGHT = 2;

    protected static $all_position = [
        1 => 'POSITION_LEFT',
        2 => 'POSITION_RIGHT',
    ];

    public $imageFile;

    public static function tableName() {

        return 'in_b_reviews';

    }

    public function behaviors() {

        return [

            [
                'class' => TimeBehavior::className(),
            ],
            [
                'class' => UploadBehavior::className(),
                'imageFile' => 'imageFile',
                'photo' => 'author_photo',
                'path' => 'uploads/reviews',
            ],

        ];
    }

    public function rules() {

        return [
            [['author_ru', 'author_en', 'author_ua', 'review_text_ru', 'review_text_en', 'review_text_ua', 'author_desc_ru', 'author_desc_en', 'author_desc_ua'], 'required'],
            [['review_text_ru', 'review_text_en', 'review_text_ua'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['status', 'position'], 'integer'],
            [['author_ru', 'author_en', 'author_ua', 'author_desc_ru', 'author_desc_en', 'author_desc_ua', 'author_photo'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'on' => 'create'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'on' => 'update'],
        ];

    }

    public function attributeLabels() {

        return [
            'id' => 'ID',
            'author_ru' => t('Author Ru'),
            'author_en' => t('Author En'),
            'author_ua' => t('Author Ua'),
            'review_text_ru' => t('Review Text Ru'),
            'review_text_en' => t('Review Text En'),
            'review_text_ua' => t('Review Text Ua'),
            'author_desc_ru' => t('Author Desc Ru'),
            'author_desc_en' => t('Author Desc En'),
            'author_desc_ua' => t('Author Desc Ua'),
            'author_photo' => 'Author Photo',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
            'position' => 'Position',
        ];

    }

    public static function positions(){

        return self::$all_position;
        
    }

    public static function findByLan() {

        $lan = Yii::$app->language;

        return self::find()->select('id, author_'.$lan.', review_text_'.$lan.', author_desc_'.$lan.', author_photo')->where(['status' => 1]);
        
    }

    public function getAuthor() {

        $lan = Yii::$app->language;

        $txt = 'author_'.$lan;

        return $this->$txt;

    }

    public function getReview_text() {

        $lan = Yii::$app->language;

        $txt = 'review_text_'.$lan;

        return $this->$txt;

    }
    
    public function getAuthor_desc() {

        $lan = Yii::$app->language;

        $txt = 'author_desc_'.$lan;

        return $this->$txt;

    }

    public static function find() {
        
        return new ReviewQuery(get_called_class());

    }

}
