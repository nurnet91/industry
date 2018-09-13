<?php

namespace app\models;

use app\models\queries\CommentQuery;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "in_comments".
 *
 * @property int $id
 * @property int $user_id
 * @property string $description
 * @property string $title
 * @property int $status
 * @property int $rating
 *
 * @property InWebinarsComments[] $inWebinarsComments
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    const STATUS_ACTIVE =1;
    public static function tableName()
    {
        return 'in_comments';
    }
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT =>['created_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'status', 'rating','parent_id'], 'integer'],
            [['status'],'default','value' => self::STATUS_ACTIVE],
            [['parent_id'],'default','value' => 0],
            [['user_id'],'default','value'=>Yii::$app->user->id],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['created_at'],'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'description' => 'Description',
            'title' => 'Title',
            'status' => 'Status',
            'rating' => 'Rating',
            'created_at'=>'Date',
            'parent_id'=>'Parent'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWebinarsComments()
    {
        return $this->hasMany(WebinarsComments::className(), ['comment_id' => 'id']);
    }
    public function getLikes(){
        return $this->hasMany(Users::className(),['id'=>'user_id'])->from(['like_comments_users'=>'in_users'])->via('commentsLikes');
    }
    public function getCommentsLikes()
    {
        return $this->hasMany(CommentsLikes::className(), ['comment_id' => 'id']);
    }
    public static function find()
    {
        return new CommentQuery(get_called_class());
    }
    public function getUser(){
        return $this->hasOne(Users::className(),['id'=>'user_id']);
    }

    public function getCountLikes()
    {
        if (!empty($this->likes)) {
            return count($this->likes);
        } else {
            return '0';
        }
    }
    public function getChildren(){
        return $this->hasMany(Comments::className(),['parent_id'=>'id'])->from(['in_comments-children'=>'in_comments'])->orderBy(['in_comments-children.id'=>SORT_DESC]);
    }
    public function getDate(){
        return Yii::$app->formatter->asDate($this->created_at,'d/M/yy');
    }
}
