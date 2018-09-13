<?php

use yii\db\Migration;

/**
 * Handles the creation of table `in_files`.
 */
class m180709_112701_create_in_files_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('in_files', [
            'id' => $this->primaryKey(),
            'link'=>$this->string()->defaultValue(null),
            'view'=>$this->integer()->defaultValue(0),
            'click'=>$this->integer()->defaultValue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('in_files');
    }
}
