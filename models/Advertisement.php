<?php

namespace app\models;

use app\components\UploadBehavior;
use Yii;

/**
 * This is the model class for table "advertisement".
 *
 * @property int $id
 * @property string $date_start
 * @property string $date_end
 * @property string $photo
 * @property int $view
 * @property int $clicks
 * @property int $status
 * @property int $position
 */
class Advertisement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $imageFile;
    const STATUS_NOACTIVE = 0;
    public static function tableName()
    {
        return 'in_advertisement';
    }
    public function behaviors() {

        return [

            [
                'class' => UploadBehavior::className(),
                'imageFile' => 'imageFile',
                'photo' => 'photo',
                'path' => 'uploads/advertisement',
            ],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_start', 'date_end'], 'safe'],
            [['date_start','date_end','imageFile'],'required'],
            [['views', 'clicks', 'status','user_id'], 'integer'],
            [['photo'],'string'],
            [['user_id'],'default','value'=>Yii::$app->user->id],
            [['status'],'default','value'=>self::STATUS_NOACTIVE],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'on' => 'create']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => t('ID'),
            'user_id'=>t('user_id'),
            'date_start' => t('Дата Начало'),
            'date_end' => t('Дата Конец'),
            'photo' => t('Photo'),
            'views' => t('View'),
            'clicks' => t('Clicks'),
            'status' => t('Status'),
            'imageFile'=>t('Загрузить фото')
        ];
    }
    public function getDateEnd(){
        return Yii::$app->formatter->asDate($this->date_end,'d/m');
    }

    public function getDateStart(){
        return Yii::$app->formatter->asDate($this->date_start,'d/m');
    }
    public function getCountClicks(){
        return $this->clicks;
    }
}
