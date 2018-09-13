<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "in_filter_publications_operations".
 *
 * @property int $publish_id
 * @property int $operation_id
 */
class FilterPublicationsOperations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_filter_publications_operations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['publish_id', 'operation_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'publish_id' => 'Publish ID',
            'operation_id' => 'Operation ID',
        ];
    }
}
