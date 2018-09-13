<?php

use yii\db\Migration;

/**
 * Handles the creation of table `in_employees`.
 */
class m180626_102352_create_in_employees_table extends Migration
{

    public function safeUp()
    {
        $this->createTable('in_employees', [
            'id' => $this->primaryKey(),
            'fio'=>$this->string(255)->defaultValue(null),
            'role'=>$this->string(255)->defaultValue(null),
            'photo'=>$this->string(255)->defaultValue(null),
            'direction'=>$this->string(255)->defaultValue(null),
            'themes'=>$this->string(255)->defaultValue(null),
            'sub_themes'=>$this->string(255)->defaultValue(null),
            'phone'=>$this->string(255)->defaultValue(null),
            'email'=>$this->string(255)->defaultValue(null),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('in_employees');
    }
}
