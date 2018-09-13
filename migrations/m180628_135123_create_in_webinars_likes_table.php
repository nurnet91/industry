<?php

use yii\db\Migration;

/**
 * Handles the creation of table `in_webinars_likes`.
 */
class m180628_135123_create_in_webinars_likes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('in_webinars_likes', [
            'webinar_id' => $this->integer(),
            'user_id'=> $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('in_webinars_likes');
    }
}
