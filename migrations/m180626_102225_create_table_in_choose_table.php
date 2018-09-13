<?php

use yii\db\Migration;

/**
 * Handles the creation of table `table_in_choose`.
 */
class m180626_102225_create_table_in_choose_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('in_chooses', [
            'id' => $this->primaryKey(),
            'photo'=>$this->string(255)->defaultValue(null),
            'description'=>$this->text()->defaultValue(null)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('in_choose');
    }
}
