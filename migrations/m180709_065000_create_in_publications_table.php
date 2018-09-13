<?php

use yii\db\Migration;

/**
 * Handles the creation of table `in_publications`.
 */
class m180709_065000_create_in_publications_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('in_publications', [
            'id' => $this->primaryKey(),
            'user_id'=>$this->integer(),
            'direction_id'=>$this->integer()->defaultValue(0),
            'type_id'=>$this->integer()->defaultValue(0),
            'title'=>$this->string(255)->defaultValue(null),
            'author'=>$this->string(255),
            'logo'=>$this->string(255)->defaultValue(null),
            'description'=>$this->text()->defaultValue(null),
            'photo'=>$this->string(255)->defaultValue(null),
            'sign'=>$this->string(255)->defaultValue(null),
            'link'=>$this->text()->defaultValue(null),
            'views'=>$this->integer()->defaultValue(0),
            'status'=>$this->integer()->defaultValue(0),
            'created_at'=>$this->timestamp()->defaultValue(null),
            'updated_at'=>$this->timestamp()->defaultValue(null),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('in_publications');
    }
}
