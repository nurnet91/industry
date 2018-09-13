<?php

namespace app\models;

use app\components\DateTimeBehavior;
use app\components\UploadBehavior;
use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "in_webinars".
 *
 * @property int $id
 * @property string $date_start
 * @property int $time_duration
 * @property string $topic
 * @property string $annotation
 * @property string $file
 * @property string $speaker_name
 * @property string $speaker_middle_name
 * @property string $speaker_last_name
 * @property string $speaker_position
 * @property string $speaker_company_name
 * @property string $organizer_name
 * @property string $organizer_middle_name
 * @property string $organizer_last_name
 * @property string $organizer_position
 * @property string $organizer_company_name
 * @property string $phone
 * @property string $email
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property CompaniesWebinars[] $inCompaniesWebinars
 * @property WebinarsComments[] $inWebinarsComments
 * @property WebinarsLikes[] $inWebinarsLikes
 * @property WebinarsParticipants[] $inWebinarsParticipants
 */
class Webinars extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $date_day;
    public $date_year;
    public $date_month;
    public $date_hours;
    public $date_minutes;
    public $dataFile;
    const STATUS_NO_ACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_PASSED = 2;
    public static function tableName()
    {
        return 'in_webinars';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors() {

        return [

          'date_format' => [
            'class' => DateTimeBehavior::className(),
            'attribute' => 'date_start',
            'format'=>'Y-m-d h:m:s',
            'year' => 'date_year',
            'hours'=>'date_hours',
            'minutes'=>'date_minutes',
            'day'=>'date_day',
            'month'=>'date_month',
            ],
            [
                'class' => UploadBehavior::className(),
                'imageFile' => 'dataFile',
                'photo' => 'file',
                'path' => 'files/webinars',
            ],


        ];
    }

    public function rules()
    {
        return [
            [['date_start', 'created_at', 'updated_at'], 'safe'],
            [['time_duration', 'status'], 'integer'],
            [['annotation'],'string','max'=>400],
            [['topic'], 'string'],
            [['file', 'speaker_name', 'speaker_middle_name', 'speaker_last_name', 'speaker_position', 'speaker_company_name', 'organizer_name', 'organizer_middle_name', 'organizer_last_name', 'organizer_position', 'organizer_company_name', 'phone', 'email'], 'string', 'max' => 255],
            [['email'],'email'],
            [['date_day','date_year','date_month'],'integer'],
            ['date_hours','number','min'=>1,'max'=>23],
            ['date_minutes','number','max'=>60],
            [['speaker_name', 'speaker_middle_name', 'speaker_last_name', 'speaker_position', 'speaker_company_name', 'organizer_name', 'organizer_middle_name', 'organizer_last_name', 'organizer_position', 'organizer_company_name', 'phone', 'email','date_day','date_year','date_month','date_hours','date_minutes','time_duration','topic', 'annotation','dataFile'], 'required'],
            [['date_day'],'validateDate'],
            [['dataFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'txt,zip,pdf,doc,docx,dot,dotx,xls,xlsx,xlt,xla,ppt,ppo,pps,ppa,rar,avi,mp4,mpeg,ogv,webm,3gp,3g2,7z$', 'on' => 'create'],
            [['dataFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'txt,zip,pdf,doc,docx,dot,dotx,xls,xlsx,xlt,xla,ppt,ppo,pps,ppa,rar,avi,mp4,mpeg,ogv,webm,3gp,3g2,7z$', 'on' => 'update'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_start' => 'Date Start',
            'time_duration' => 'Time Duration',
            'topic' => 'Topic',
            'annotation' => 'Annotation',
            'file' => 'File',
            'speaker_name' => 'Speaker Name',
            'speaker_middle_name' => 'Speaker Middle Name',
            'speaker_last_name' => 'Speaker Last Name',
            'speaker_position' => 'Speaker Position',
            'speaker_company_name' => 'Speaker Company Name',
            'organizer_name' => 'Organizer Name',
            'organizer_middle_name' => 'Organizer Middle Name',
            'organizer_last_name' => 'Organizer Last Name',
            'organizer_position' => 'Organizer Position',
            'organizer_company_name' => 'Organizer Company Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompaniesWebinars()
    {
        return $this->hasMany(CompaniesWebinars::className(), ['webinar_id' => 'id']);
    }
    public function getComments(){
        return $this->hasMany(Comments::className(),['id'=>'comment_id'])->via('webinarsComments');
    }
    public function getLikes(){
        return $this->hasMany(Users::className(),['id'=>'user_id'])->from(['like_users'=>'in_users'])->via('webinarsLikes');
    }
    public function getParticipants(){
        return $this->hasMany(Users::className(),['id'=>'user_id'])->from(['like_parti'=>'in_users'])->via('webinarsParticipants');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWebinarsComments()
    {
        return $this->hasMany(WebinarsComments::className(), ['webinar_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWebinarsLikes()
    {
        return $this->hasMany(WebinarsLikes::className(), ['webinar_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWebinarsParticipants()
    {
        return $this->hasMany(WebinarsParticipants::className(), ['webinar_id' => 'id']);
    }
    public function validateDate($attribute, $params){
        if($this->date_day && $this->date_year && $this->date_month != 0){
            if(checkdate($this->date_month, $this->date_day, $this->date_year) == false){
                $this->addError($attribute, t('Не верная дата'));
            }
        }
    }
    public function getDate(){
        return Yii::$app->formatter->asDate($this->date_start,'d/M/yy');
    }
    public function getTimes(){
        return date('h:m');
    }
    public function getTimeDuration(){
        return $this->time_duration.' м';
    }
    public function getSpeakerFio(){
        return $this->speaker_last_name.' '.$this->speaker_name.' '.$this->speaker_middle_name;

    }
    public function getOrganizerFio(){
        return $this->organizer_last_name.' '.$this->organizer_name.' '.$this->organizer_middle_name;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPhone(){
        return $this->phone;
    }
    public function getFile(){
        return $this->file;
    }
    public function getTopic(){
        return $this->topic;
    }
    public function getAnnotation(){
        return $this->annotation;
    }
    public function getSpeakerCompanyName(){
        return $this->speaker_company_name;
    }
    public function getOrganizerCompanyName(){
        return $this->organizer_company_name;
    }
    public function getCountLikes(){
        $count =  count($this->likes);
        if(empty($count)){
            $count = '0';
        }
        return $count;
    }
    public function getCountComments(){
        $count =  count($this->comments);
        if(empty($count)){
            $count = '0';
        }
        return $count;
    }
    public function getCountUsers(){
        $count =  count($this->participants);
        if(empty($count)){
            $count = '0';
        }
        return $count;
    }
    public function getLinkComments(){
       return Url::to('comments');
    }
    public function getLinkLikes(){
       return Url::to('likes');
    }
    public function getLinkUsers(){
        return Url::to('users');
    }
    public function getLinkRedactor(){
        return Url::to('redactor');
    }
    public function getLinkFile(){
        return Url::to(['/main/download','file'=>$this->file]);
    }
    public static function find(){
        return new WebinarsQuery(get_called_class());
    }
}



