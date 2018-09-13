<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "in_filter_publications_attributes".
 *
 * @property int $publish_id
 * @property int $attribute_id
 */
class FilterPublicationsAttributes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_filter_publications_attributes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['publish_id', 'attribute_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'publish_id' => 'Publish ID',
            'attribute_id' => 'Attribute ID',
        ];
    }
}
