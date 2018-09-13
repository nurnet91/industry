<?php

namespace app\models;

use app\components\UploadBehavior;
use Yii;

/**
 * This is the model class for table "in_ih_about".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $photo
 * @property int $status
 */
class IhAbout extends \yii\db\ActiveRecord
{
    public $imageFile;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_ih_about';
    }

    public function behaviors() {

        return [
            [
                'class' => UploadBehavior::className(),
                'imageFile' => 'imageFile',
                'photo' => 'photo',
                'path' => 'uploads/categories',
            ],

        ];

    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            [['id', 'status'], 'integer'],
            [['description'], 'string'],
            [['title', 'photo'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg, mp4', 'on' => 'create'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, mp4', 'on' => 'update'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'photo' => 'Photo',
            'status' => 'Status',
        ];
    }
}
