<?php

use yii\db\Migration;

/**
 * Handles the creation of table `in_placement_requests`.
 */
class m180725_051640_create_in_placement_requests_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('in_placement_requests', [
            'id' => $this->primaryKey(),
            'company_name'=>$this->string(255)->defaultValue(null),
            'user_id'=>$this->integer()->defaultValue(0),
            'phone'=>$this->string(255)->defaultValue(null),
            'email'=>$this->string(255)->defaultValue(null),
            'middle_name'=>$this->string(255)->defaultValue(null),
            'first_name'=>$this->string(255)->defaultValue(null),
            'last_name'=>$this->string(255)->defaultValue(null),
            'requisites'=>$this->text()->defaultValue(null),
            'file_requisites'=>$this->string(255)->defaultValue(null),
            'file'=>$this->string(255)->defaultValue(null),
            'comment'=>$this->text()->defaultValue(null),
            'status'=>$this->integer(),
            'token'=>$this->string(255)->defaultValue(0),
            'created_at'=>$this->timestamp(),
        ]);
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('in_placement_requests');
    }
}
