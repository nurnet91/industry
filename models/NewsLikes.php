<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "in_news_likes".
 *
 * @property int $new_id
 * @property int $user_id
 */
class NewsLikes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_news_likes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['new_id', 'user_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'new_id' => 'New ID',
            'user_id' => 'User ID',
        ];
    }
}
