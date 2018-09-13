<?php

use yii\db\Migration;

/**
 * Handles the creation of table `in_webinars`.
 */
class m180628_135807_create_in_webinars_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('in_webinars', [
            'id' => $this->primaryKey(),
            'date_start'=>$this->timestamp(),
            'time_duration'=>$this->integer(),
            'topic'=>$this->text()->defaultValue(null),
            'annotation'=>$this->text()->defaultValue(null),
            'file'=>$this->string(255)->defaultValue(null),
            'speaker_name'=>$this->string(255)->defaultValue(null),
            'speaker_middle_name'=>$this->string(255)->defaultValue(null),
            'speaker_last_name'=>$this->string(255)->defaultValue(null),
            'speaker_position'=>$this->string(255)->defaultValue(null),
            'speaker_company_name'=>$this->string(255)->defaultValue(null),
            'organizer_name'=>$this->string(255)->defaultValue(null),
            'organizer_middle_name'=>$this->string(255)->defaultValue(null),
            'organizer_last_name'=>$this->string(255)->defaultValue(null),
            'organizer_position'=>$this->string(255)->defaultValue(null),
            'organizer_company_name'=>$this->string(255)->defaultValue(null),
            'phone'=>$this->string(255)->defaultValue(null),
            'email'=>$this->string(255)->defaultValue(null),
            'status'=>$this->tinyInteger(4)->defaultValue(0),
            'created_at'=>$this->timestamp(),
            'updated_at'=>$this->timestamp(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('in_webinars');
    }
}
