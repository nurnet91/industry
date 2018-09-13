<?php

use yii\db\Migration;

/**
 * Handles the creation of table `table_in_certificates`.
 */
class m180626_102046_create_table_in_certificates_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('in_certificates', [
            'id' => $this->primaryKey(),
            'description'=>$this->text()->defaultValue(null),
            'photo'=>$this->string(255)->defaultValue(null)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('in_certificates');
    }
}
