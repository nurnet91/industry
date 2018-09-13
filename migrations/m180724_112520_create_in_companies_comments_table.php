<?php

use yii\db\Migration;

/**
 * Handles the creation of table `in_companies_comments`.
 */
class m180724_112520_create_in_companies_comments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('in_companies_comments', [
            'user_id'=>$this->integer(),
            'comment_id'=>$this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('in_companies_comments');
    }
}
