<?php

use yii\db\Migration;

/**
 * Handles the creation of table `in_company_choose`.
 */
class m180626_101639_create_in_company_choose_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('in_companies_chooses', [
            'company_id' => $this->integer(),
            'choose_id'=>$this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('in_company_choose');
    }
}
