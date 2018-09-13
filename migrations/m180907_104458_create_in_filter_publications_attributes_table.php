<?php

use yii\db\Migration;

/**
 * Handles the creation of table `in_filter_publications_attributes`.
 */
class m180907_104458_create_in_filter_publications_attributes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('in_filter_publications_attributes', [
            'publish_id' => $this->integer(),
            'attribute_id'=>$this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('in_filter_publications_attributes');
    }
}
