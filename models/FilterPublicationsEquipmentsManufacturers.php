<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "in_filter_publications_equipments_manufacturers".
 *
 * @property int $publish_id
 * @property int $equipment_manufacturer_id
 */
class FilterPublicationsEquipmentsManufacturers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_filter_publications_equipments_manufacturers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['publish_id', 'equipment_manufacturer_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'publish_id' => 'Publish ID',
            'equipment_manufacturer_id' => 'Equipment Manufacturer ID',
        ];
    }
}
