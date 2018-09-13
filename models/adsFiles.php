<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "in_files_ads".
 *
 * @property int $file_id
 * @property int $ad_id
 */
class adsFiles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_files_ads';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file_id', 'ad_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'file_id' => 'File ID',
            'ad_id' => 'Ad ID',
        ];
    }
    public function getAds()
    {
        return $this->hasOne(CompanyAds::className(), ['id' => 'ad_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFile()
    {
        return $this->hasOne(Files::className(), ['id' => 'file_id']);
    }
}
