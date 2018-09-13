<?php

use yii\db\Migration;

/**
 * Handles the creation of table `in_seen_company`.
 */
class m180724_091418_create_in_seen_company_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('in_seen_company', [
            'id' => $this->primaryKey(),
            'user_id'=>$this->integer(),
            'company_id'=>$this->integer(),
            'created_at'=>$this->timestamp(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('in_seen_company');
    }
}
