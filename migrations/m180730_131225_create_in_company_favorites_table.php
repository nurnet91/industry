<?php

use yii\db\Migration;

/**
 * Handles the creation of table `in_company_favorites`.
 */
class m180730_131225_create_in_company_favorites_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('in_company_favorites', [
            'company_id' => $this->integer(),
            'user_id'=>$this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('in_company_favorites');
    }
}
