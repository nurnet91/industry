<?php

use yii\db\Migration;

/**
 * Handles the creation of table `in_webinars_comments`.
 */
class m180628_134927_create_in_webinars_comments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('in_webinars_comments', [
            'webinar_id' => $this->integer(),
            'comment_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('in_webinars_comments');
    }
}
