<?php

use yii\db\Migration;

/**
 * Handles the creation of table `in_files_ads`.
 */
class m180711_050442_create_in_files_ads_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('in_files_ads', [
            'file_id' => $this->integer(),
            'ad_id'=>$this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('in_files_ads');
    }
}
