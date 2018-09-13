<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "in_webinars_likes".
 *
 * @property int $webinar_id
 * @property int $user_id
 *
 * @property InUsers $user
 * @property InWebinars $webinar
 */
class WebinarsLikes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_webinars_likes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['webinar_id', 'user_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => InUsers::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(InUsers::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWebinar()
    {
        return $this->hasOne(InWebinars::className(), ['id' => 'webinar_id']);
    }
}
