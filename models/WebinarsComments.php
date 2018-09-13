<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "in_webinars_comments".
 *
 * @property int $webinar_id
 * @property int $comment_id
 *
 * @property InComments $comment
 * @property InWebinars $webinar
 */
class WebinarsComments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_webinars_comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['webinar_id', 'comment_id'], 'integer'],
            [['comment_id'], 'exist', 'skipOnError' => true, 'targetClass' => InComments::className(), 'targetAttribute' => ['comment_id' => 'id']],
            [['webinar_id'], 'exist', 'skipOnError' => true, 'targetClass' => InWebinars::className(), 'targetAttribute' => ['webinar_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'webinar_id' => 'Webinar ID',
            'comment_id' => 'Comment ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComment()
    {
        return $this->hasOne(InComments::className(), ['id' => 'comment_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWebinar()
    {
        return $this->hasOne(InWebinars::className(), ['id' => 'webinar_id']);
    }
}
