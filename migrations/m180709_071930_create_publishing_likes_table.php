<?php

use yii\db\Migration;

/**
 * Handles the creation of table `publishing_likes`.
 */
class m180709_071930_create_publishing_likes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('in_publishing_likes', [
            'publish_id' => $this->integer(),
            'user_id'=>$this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('publishing_likes');
    }
}
