<?php

use yii\db\Migration;

/**
 * Handles the creation of table `in_companie_employees`.
 */
class m180626_102337_create_in_companie_employees_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('in_companies_employees', [
            'company_id' => $this->integer(),
            'employee_id'=>$this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('in_companie_employees');
    }
}
