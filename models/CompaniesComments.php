<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "in_companies_comments".
 *
 * @property int $user_id
 * @property int $comment_id
 */
class CompaniesComments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_companies_comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'comment_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'comment_id' => 'Comment ID',
        ];
    }
}
