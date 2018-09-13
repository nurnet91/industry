<?php

use yii\db\Migration;

/**
 * Handles the creation of table `in_filter_publications_technologies`.
 */
class m180907_113454_create_in_filter_publications_technologies_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('in_filter_publications_technologies', [
            'publish_id' => $this->integer(),
            'technology_id'=>$this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('in_filter_publications_technologies');
    }
}
