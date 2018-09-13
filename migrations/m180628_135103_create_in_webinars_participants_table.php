<?php

use yii\db\Migration;

/**
 * Handles the creation of table `in_webinars_participants`.
 */
class m180628_135103_create_in_webinars_participants_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('in_webinars_participants', [
            'webinar_id' => $this->integer(),
            'user_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('in_webinars_participants');
    }
}
