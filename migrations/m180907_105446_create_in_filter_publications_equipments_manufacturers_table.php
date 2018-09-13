<?php

use yii\db\Migration;

/**
 * Handles the creation of table `in_filter_publications_equipments_manufacturers`.
 */
class m180907_105446_create_in_filter_publications_equipments_manufacturers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('in_filter_publications_equipments_manufacturers', [
            'publish_id' => $this->integer(),
            'equipment_manufacturer_id'=>$this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('in_filter_publications_equipments_manufacturers');
    }
}
