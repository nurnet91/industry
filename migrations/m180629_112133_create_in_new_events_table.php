<?php

use yii\db\Migration;

class m180629_112133_create_in_new_events_table extends Migration {

    public function safeUp() {

        $this->createTable('in_new_events', [
            'id'            => $this->primaryKey(),
            'category_id'   => 'INT NOT NULL',
            'photo'         => 'VARCHAR(255) NULL',
            'title_ru'      => 'VARCHAR(255) NOT NULL',
            'title_ua'      => 'VARCHAR(255) NOT NULL',
            'title_en'      => 'VARCHAR(255) NOT NULL',
            'text_ru'       => 'TEXT NULL',
            'text_en'       => 'TEXT NULL',
            'text_ua'       => 'TEXT NULL',
            'adres'         => 'VARCHAR(255) NULL',
            'created_at'    => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at'    => 'TIMESTAMP NULL',
            'status'        => 'TINYINT(2) NOT NULL DEFAULT \'1\'',
        ]);

        $this->createIndex('category_id-in_new_events', 'in_new_events', 'category_id');

    }

    public function safeDown() {

        $this->dropTable('in_new_events');

    }

}
