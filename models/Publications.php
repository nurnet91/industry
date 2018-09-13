<?php

namespace app\models;

use app\components\FileUploadBehavior;
use app\components\UploadBehavior;
use app\models\queries\PublicationsQuery;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
 * This is the model class for table "in_publications".
 *
 * @property int $id
 * @property int $direction_id
 * @property int $type_id
 * @property string $title
 * @property string $author
 * @property string $logo
 * @property string $description
 * @property string $photo
 * @property string $link
 * @property int $views
 * @property string $created_at
 * @property string $updated_at
 */
class Publications extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    const STATUS_NOACTIVE = 0;
    const STATUS_ACTIVE = 1;
    public $logoFile;
    public $imageFile;
    public $multiFile;
    public function behaviors() {

        return [

            [
                'class' => FileUploadBehavior::className(),
                'dataFile' => 'multiFile',
                'file' => 'file',
                'relationName' => 'files',
                'modelClassName' =>Files::className(),
                'url' => 'link',
                'path' => 'files/publications',

            ],
            [
                'class' => UploadBehavior::className(),
                'imageFile' => 'logoFile',
                'photo' => 'logo',
                'path' => 'uploads/publications',
            ],
            [
                'class' => UploadBehavior::className(),
                'imageFile' => 'imageFile',
                'photo' => 'photo',
                'path' => 'uploads/publications',
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

    public static function tableName()
    {
        return 'in_publications';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'],'default','value'=>Yii::$app->user->id],
            [['direction_id', 'type_id', 'views'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['description'],'string','max'=>400],
            [['description','title','author'],'required'],
            [['title', 'author', 'logo', 'photo', 'link'], 'string', 'max' => 255],
            [['status'],'default','value'=>self::STATUS_NOACTIVE],
            [['sign'],'string'],
            [['multiFile'],'safe'],
            [['imageFile','logoFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'on' => 'create'],
            [['imageFile','logoFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'on' => 'update'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'direction_id' => 'Direction ID',
            'type_id' => 'Type ID',
            'title' => 'Title',
            'author' => 'Author',
            'logo' => 'Logo',
            'description' => 'Description',
            'photo' => 'Photo',
            'link' => 'Link',
            'views' => 'Views',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public function getDate(){
        return Yii::$app->formatter->asDate($this->created_at,'d/M/yy');
    }
    public function getTitle(){
        return $this->title;
    }
    public function getSingleLink(){
        return Url::to('/publication/view',['id'=>$this->id]);
    }
    public function getType(){
        return News::Type($this->type_id);
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
    public function getView(){
        if($this->views == null){
            return '0';
        }
        else $this->views;
    }
    public function getPublicationsComments()
    {
        return $this->hasMany(PublishingComments::className(), ['publish_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPublicationsLikes()
    {
        return $this->hasMany(PublishingLikes::className(), ['publish_id' => 'id']);
    }
    public function getComments(){
        return $this->hasMany(Comments::className(),['id'=>'comment_id'])->via('publicationsComments');
    }
    public function getLikes(){
        return $this->hasMany(Users::className(),['id'=>'user_id'])->from(['like_users'=>'in_users'])->via('publicationsLikes');
    }
    public function getUser(){
        return $this->hasOne(Users::className(),['id'=>'user_id']);
    }
    public static function find()
    {
        return new PublicationsQuery(get_called_class());
    }
    public function getFiles(){
        return $this->hasMany(Files::className(),['id' => 'file_id'])->via('publicationsFiles');

    }
    public function getPublicationsFiles(){
        return $this->hasMany(PublicationsFiles::className(),['publish_id' => 'id']);

    }
    public function getPopulars(){
        $query = (new \yii\db\Query())
            ->select([
                'publish_id',
                'COUNT(user_id) AS topcount'
            ])
            ->from(PublishingLikes::tableName())
            ->groupBy(['publish_id'])
            ->orderBy(['topcount' => SORT_DESC]);
        $rows = $query->all();
        $ids= ArrayHelper::getColumn($rows , 'publish_id');
        $model = self::find()
            ->andWhere(['in',self::tableName().'.id',$ids])->active()->joinWith('user')->likes();
        return  $popular = new ActiveDataProvider([
            'query'=>$model,
            'pagination'=>[
                'pageSize' => 8
            ]
        ]);
    }
    public function getDiscussed(){
        $query = (new \yii\db\Query())
            ->select([
                'publish_id',
                'COUNT(comment_id) AS topcount'
            ])
            ->from(PublishingComments::tableName())
            ->groupBy(['publish_id'])
            ->orderBy(['topcount' => SORT_DESC]);
        $rows = $query->all();
        $ids= ArrayHelper::getColumn($rows , 'publish_id');
        $model = self::find()
            ->andWhere(['in',self::tableName().'.id',$ids])->joinWith('user')->likes()
            ->active();
        return  $discussed = new ActiveDataProvider([
            'query'=>$model,
            'pagination'=>[
                'pageSize' => 8
            ]
        ]);
    }
    public function getNews(){
        $model = self::find()->orderBy(['created_at'=>SORT_DESC])->joinWith('user')->likes();
        return $news = new ActiveDataProvider([
            'query'=>$model,
            'pagination'=>[
                'pageSize' => 8
            ]
        ]);
    }

    public function getFilterAttribute(){
        return $this->hasMany(FilterAttributes::className(), ['id' => 'attribute_id'])->via('filterPublicationsAttributes');
    }

    public function getFilterPublicationsAttributes(){
        return $this->hasMany(FilterPublicationsAttributes::className(), ['publish_id' => 'id']);
    }
    public function getFilterTechnologies(){
        return $this->hasMany(FilterTechnologies::className(), ['id' => 'technology_id'])->via('filterPublicationsTechnologies');
    }

    public function getFilterPublicationsTechnologies(){
        return $this->hasMany(FilterPublicationsTechnologies::className(), ['publish_id' => 'id']);
    }

    public function getFilterEquipmentManufacturers(){
        return $this->hasMany(FilterEquipmentManufacturers::className(), ['id' => 'equipment_manufacturer_id'])->via('filterPublicationsEquipmentsManufacturers');
    }

    public function getFilterPublicationsEquipmentsManufacturers(){
        return $this->hasMany(FilterPublicationsEquipmentsManufacturers::className(), ['publish_id' => 'id']);
    }

    public function getFilterOperations(){
        return $this->hasMany(FilterOperations::className(), ['id' => 'operation_id'])->via('filterPublicationsOperations');
    }

    public function getFilterPublicationsOperations(){
        return $this->hasMany(FilterPublicationsOperations::className(), ['publish_id' => 'id']);
    }

    public function getFilterEquipmentTypes(){
        return $this->hasMany(FilterEquipmentTypes::className(), ['id' => 'equipment_type_id'])->via('filterPublicationsEquipmentsTypes');
    }

    public function getFilterPublicationsEquipmentsTypes(){
        return $this->hasMany(FilterPublicationsEquipmentsTypes::className(), ['publish_id' => 'id']);
    }


}
