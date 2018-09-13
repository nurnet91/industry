<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news_analytics_users`.
 */
class m180723_092957_create_news_analytics_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('in_news_analytics_users', [
            'id' => $this->primaryKey(),
            'user_id'=>$this->integer(),
            'last_visit'=>$this->timestamp(),
            'visit'=>$this->timestamp(),
            'ip'=>$this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('news_analytics_users');
    }
}
