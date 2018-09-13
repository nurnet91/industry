<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "in_news_comments".
 *
 * @property int $new_id
 * @property int $comment_id
 */
class NewsComments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_news_comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['new_id', 'comment_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'new_id' => 'New ID',
            'comment_id' => 'Comment ID',
        ];
    }

}
