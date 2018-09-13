<?php

use yii\db\Migration;

/**
 * Handles the creation of table `table_in_companies_certificates`.
 */
class m180626_102023_create_table_in_companies_certificates_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('in_companies_certificates', [
            'company_id' => $this->integer(),
            'certificate_id'=>$this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('in_companies_certificates');
    }
}
