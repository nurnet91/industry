<?php

use yii\db\Migration;

/**
 * Handles the creation of table `table_in_company_about`.
 */
class m180626_101945_create_table_in_company_about_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('in_company_about', [
            'id' => $this->primaryKey(),
            'user_id'=>$this->integer(),
            'description'=>$this->text()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('in_company_about');
    }
}
