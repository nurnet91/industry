<?php

use yii\db\Migration;

/**
 * Handles the creation of table `in_companies_webinars`.
 */
class m180628_134828_create_in_companies_webinars_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('in_companies_webinars', [
            'company_id'=>$this->integer(),
            'webinar_id'=>$this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('in_companies_webinars');
    }
}
