<?php

use yii\db\Migration;

/**
 * Handles the creation of table `in_news`.
 */
class m180713_041957_create_in_news_table extends Migration
{  public function safeUp() {

    $this->createTable('in_news', [
        'id'            => $this->primaryKey(),
        'category_id'   => 'INT NOT NULL',
        'photo'         => 'VARCHAR(255) NULL',
        'anotation_ru'  =>'TEXT NULL',
        'anotation_en'  =>'TEXT NULL',
        'anotation_ua'  =>'TEXT NULL',
        'author'        =>'VARCHAR(255) NULL',
        'user_id'       =>  $this->integer(),
        'type_id'       =>  $this->tinyInteger(3),
        'title_ru'      => 'VARCHAR(255) NOT NULL',
        'title_en'      => 'VARCHAR(255) NOT NULL',
        'title_ua'      => 'VARCHAR(255) NOT NULL',
        'text_ru'       => 'TEXT NULL',
        'text_en'       => 'TEXT NULL',
        'text_ua'       => 'TEXT NULL',
        'link'          => 'VARCHAR(255) NULL',
        'created_at'    => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
        'updated_at'    => 'TIMESTAMP NULL',
        'status'        => 'TINYINT(2) NOT NULL DEFAULT \'1\'',
        'views'         =>  $this->integer()->defaultValue(0)
    ]);

}

    public function safeDown() {

        $this->dropTable('in_news');

    }
}
