<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "in_publishing_likes".
 *
 * @property int $publish_id
 * @property int $like_id
 */
class PublishingLikes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_publishing_likes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['publish_id', 'user_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'publish_id' => 'Publish ID',
            'user_id' => 'User ID',
        ];
    }
}
