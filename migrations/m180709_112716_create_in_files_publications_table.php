<?php

use yii\db\Migration;

/**
 * Handles the creation of table `in_files_publications`.
 */
class m180709_112716_create_in_files_publications_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('in_files_publications', [
            'file_id' =>$this->integer(),
            'publish_id'=>$this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('in_files_publications');
    }
}
