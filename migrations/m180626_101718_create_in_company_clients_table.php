<?php

use yii\db\Migration;

/**
 * Handles the creation of table `in_company_clients`.
 */
class m180626_101718_create_in_company_clients_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('in_companies_clients', [
            'company_id' => $this->integer(),
            'client_id'=>$this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('in_companies_clients');
    }
}
