<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "in_files_publications".
 *
 * @property int $file_id
 * @property int $publish_id
 */
class PublicationsFiles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_files_publications';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file_id', 'publish_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'file_id' => 'File ID',
            'publish_id' => 'Publish ID',
        ];
    }
}
