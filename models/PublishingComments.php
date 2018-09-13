<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "in_publishing_comments".
 *
 * @property int $publish_id
 * @property int $comment_id
 */
class PublishingComments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_publishing_comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['publish_id', 'comment_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'publish_id' => 'Publish ID',
            'comment_id' => 'Comment ID',
        ];
    }
}
