<?php

use yii\db\Migration;

/**
 * Handles the creation of table `in_company_about`.
 */
class m180727_061656_create_in_company_about_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('in_company_about', [
            'id' => $this->primaryKey(),
            'user_id'=>$this->integer(),
            'description'=>$this->text()->defaultValue(null),
            'direction_id'=>$this->integer(),
            'theme_id'=>$this->integer(),
            'first_name'=>$this->string(255),
            'last_name'=>$this->string(255),
            'middle_name'=>$this->string(255),
            'role'=>$this->string(255),
            'photo'=>$this->string(255),
            'first_name_two'=>$this->string(255),
            'last_name_two'=>$this->string(255),
            'middle_name_two'=>$this->string(255),
            'role_two'=>$this->string(255),
            'photo_two'=>$this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('in_company_about');
    }
}
