<?php

use yii\db\Migration;

/**
 * Handles the creation of table `publishing_comments`.
 */
class m180709_071913_create_publishing_comments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('in_publishing_comments', [
            'publish_id' => $this->integer(),
            'comment_id'=>$this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('publishing_comments');
    }
}
