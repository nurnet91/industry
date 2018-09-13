<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "in_filter_publications_equipments_types".
 *
 * @property int $publish_id
 * @property int $equipment_type_id
 */
class FilterPublicationsEquipmentsTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_filter_publications_equipments_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['publish_id', 'equipment_type_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'publish_id' => 'Publish ID',
            'equipment_type_id' => 'Equipment Type ID',
        ];
    }
}
