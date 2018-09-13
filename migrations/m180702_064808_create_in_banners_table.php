<?php

use yii\db\Migration;

class m180702_064808_create_in_banners_table extends Migration {

    public function safeUp() {

        $this->createTable('in_banners', [
            'id'            => $this->primaryKey(),
            'category_id'   => 'INT NULL',
            'photo'         => 'VARCHAR(255) NOT NULL',
            'title_ru'      => 'VARCHAR(255) NULL',
            'title_ua'      => 'VARCHAR(255) NULL',
            'title_en'      => 'VARCHAR(255) NULL',
            'created_at'    => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at'    => 'TIMESTAMP NULL',
            'status'        => 'TINYINT(2) NOT NULL DEFAULT \'1\'',
        ]);

        $this->createIndex('category_id-in_banners', 'in_banners', 'category_id');

    }

    public function safeDown() {

        $this->dropTable('in_banners');

    }

}
