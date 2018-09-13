<?php

use yii\db\Migration;

/**
 * Handles the creation of table `in_company_capabilities`.
 */
class m180626_101323_create_in_company_capabilities_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('in_company_capabilities', [
            'id' => $this->primaryKey(),
            'user_id'=>$this->integer(),
            'photo'=>$this->string(255)->defaultValue(null),
            'description'=>$this->text()->defaultValue(null),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('in_company_capabilities');
    }
}
