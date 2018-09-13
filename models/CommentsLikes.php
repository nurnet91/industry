<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "in_comments_likes".
 *
 * @property int $comment_id
 * @property int $user_id
 */
class CommentsLikes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_comments_likes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['comment_id', 'user_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'comment_id' => 'Comment ID',
            'user_id' => 'User ID',
        ];
    }
}
