<?php

use yii\db\Migration;

/**
 * Handles the creation of table `in_companies_testimonials`.
 */
class m180627_090242_create_in_companies_testimonials_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('in_companies_testimonials', [
            'company_id' => $this->integer(),
            'testimonial_id'=>$this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('in_companies_testimonials');
    }
}
