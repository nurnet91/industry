<?php

namespace app\models;

use app\components\FileUploadBehavior;
use app\components\UploadBehavior;
use app\models\queries\AdsQuery;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\helpers\Url;

/**
 * This is the model class for table "in_ads".
 *
 * @property int $id
 * @property int $company_id
 * @property int $type_id
 * @property string $logo
 * @property string $company_name
 * @property string $vacancy_name
 * @property bool $link_profile
 * @property string $file
 * @property string $created_at
 * @property string $updated_at
 */
class CompanyAds extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    const Vacancies = 1;
    const STATUS_ACTIVE = 1;
    const STATUS_NOACTIVE = 0;
    public $dataFile;
    public $imageFile;
    public static function tableName()
    {
        return 'in_ads';
    }
    public function behaviors() {

        return [

               [ 'class' => FileUploadBehavior::className(),
                'dataFile' => 'dataFile',
                'file' => 'file',
                'relationName' => 'files',
                'modelClassName' =>Files::className(),
                'url' => 'link',
                'path' => 'files/companyads',
                'uploadedFileFunction'=>false
            ],
            [
                'class' => UploadBehavior::className(),
                'imageFile' => 'imageFile',
                'photo' => 'logo',
                'path' => 'uploads/companyads',
                'uploadedFileFunction'=>false

            ],
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT =>['created_at', 'updated_at'],
                    ActiveRecord::EVENT_AFTER_UPDATE =>['updated_at'],
                ],
                'value' => new Expression('NOW()'),
            ],

        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'],'default','value'=>Yii::$app->user->id],
            [['user_id', 'type_id'],'integer'],
            [['user_id', 'type_id','status'], 'integer'],
            [['link_profile'], 'safe'],
            [['link_profile'],'validateCheckbox'],
            [['created_at', 'updated_at'], 'safe'],
            [['logo', 'company_name', 'vacancy_name'], 'string', 'max' => 255],
            [['status'],'default','value'=>0],
            [['dataFile','imageFile'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_id' => 'Type ID',
            'logo' => 'Logo',
            'company_name' => 'Company Name',
            'vacancy_name' => 'Vacancy Name',
            'link_profile' => 'Link Profile',
            'status'=>'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public function validateCheckbox(){
        if(empty($this->link_profile)){
            return false;
        }
        else {
            return true;
        }
    }
    public function getType(){
        return 'Вакансии';
    }
    public function getName(){
        return $this->vacancy_name;
    }
    public function getStatus(){
        return $this->status;
    }
    public function getDate(){
        return Yii::$app->formatter->asDate($this->created_at,'d/M/yy');
    }
    public function getSingleLink(){
        return Url::to('/main/ads');
    }
    public static function find()
    {
        return new AdsQuery(get_called_class());
    }
    public function getFiles(){
        return $this->hasMany(Files::className(),['id' => 'file_id'])->via('adsFiles');

    }
    public function getAdsFiles(){
        return $this->hasMany(adsFiles::className(),['ad_id' => 'id']);

    }
}
