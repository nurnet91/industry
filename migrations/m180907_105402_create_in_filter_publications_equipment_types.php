<?php

use yii\db\Migration;

/**
 * Class m180907_105402_create_in_filter_publications_equipment_types
 */
class m180907_105402_create_in_filter_publications_equipment_types extends Migration
{
    public function safeUp()
    {
        $this->createTable('in_filter_publications_equipments_types', [
            'publish_id' => $this->integer(),
            'equipment_type_id'=>$this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('in_filter_publications_equipments_types');
    }
}
