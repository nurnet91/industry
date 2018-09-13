<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "in_filter_publications_technologies".
 *
 * @property int $publish_id
 * @property int $technology_id
 */
class FilterPublicationsTechnologies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_filter_publications_technologies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['publish_id', 'technology_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'publish_id' => 'Publish ID',
            'technology_id' => 'Technology ID',
        ];
    }
}
