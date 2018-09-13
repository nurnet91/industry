<?php

use yii\db\Migration;

/**
 * Handles the creation of table `in_companies_placement_requests`.
 */
class m180725_052617_create_in_companies_placement_requests_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('in_companies_placement_requests', [
            'user_id'=>$this->integer(),
            'placement_id'=>$this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('in_companies_placement_requests');
    }
}
