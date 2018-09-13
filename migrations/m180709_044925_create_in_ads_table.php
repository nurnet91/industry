<?php

use yii\db\Migration;

/**
 * Handles the creation of table `in_ads`.
 */
class m180709_044925_create_in_ads_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('in_ads', [
            'id' => $this->primaryKey(),
            'type_id' => $this->tinyInteger(3),
            'logo' => $this->string(255)->defaultValue(null),
            'company_name' => $this->string(255)->defaultValue(null),
            'vacancy_name' => $this->string(255)->defaultValue(null),
            'link_profile' => $this->boolean(),
            'status'=>$this->tinyInteger(3)->defaultValue(0),
            'created_at' => $this->timestamp(255)->defaultValue(null),
            'updated_at' => $this->timestamp(255)->defaultValue(null),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('in_ads');
    }
}
