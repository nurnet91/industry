<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "in_files".
 *
 * @property int $id
 * @property string $link
 * @property int $view
 * @property int $click
 */
class Files extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_files';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['view', 'click'], 'integer'],
            [['link'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'link' => 'Link',
            'view' => 'View',
            'click' => 'Click',
        ];
    }
    public function getAds(){
        return $this->hasMany(CompanyAds::className(),['id' => 'ad_id'])->via('adsFiles');

    }
    public function getAdsFiles(){
        return $this->hasMany(adsFiles::className(),['file_id' => 'id']);
    }
}
