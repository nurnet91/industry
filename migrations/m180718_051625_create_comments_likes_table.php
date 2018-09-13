<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comments_likes`.
 */
class m180718_051625_create_comments_likes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('in_comments_likes', [
            'comment_id' => $this->integer(),
            'user_id'=>$this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('in_comments_likes');
    }
}
