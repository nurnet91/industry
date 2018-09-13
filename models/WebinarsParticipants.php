<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "in_webinars_participants".
 *
 * @property int $webinar_id
 * @property int $user_id
 *
 * @property Users $user
 * @property Webinars $webinar
 */
class WebinarsParticipants extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_webinars_participants';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['webinar_id', 'user_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['webinar_id'], 'exist', 'skipOnError' => true, 'targetClass' => Webinars::className(), 'targetAttribute' => ['webinar_id' => 'id']],
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
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWebinar()
    {
        return $this->hasOne(Webinars::className(), ['id' => 'webinar_id']);
    }
}
