<?php

use yii\db\Migration;

/**
 * Handles the creation of table `table_in_clients`.
 */
class m180626_102115_create_table_in_clients_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('in_clients', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(255)->defaultValue(null),
            'photo'=>$this->string(255)->defaultValue(null)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('in_clients');
    }
}
