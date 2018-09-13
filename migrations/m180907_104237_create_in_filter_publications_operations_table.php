<?php

use yii\db\Migration;

/**
 * Handles the creation of table `in_filter_publications_operations`.
 */
class m180907_104237_create_in_filter_publications_operations_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('in_filter_publications_operations', [
            'publish_id' => $this->integer(),
            'operation_id'=>$this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('in_filter_publications_operations');
    }
}
