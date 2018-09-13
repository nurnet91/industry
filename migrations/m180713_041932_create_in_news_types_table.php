<?php

use yii\db\Migration;

/**
 * Handles the creation of table `in_news_types`.
 */
class m180713_041932_create_in_news_types_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('in_news_types', [
            'id' => $this->primaryKey(),
            'name_ru'=>$this->string(255),
            'name_ua'=>$this->string(255),
            'name_en'=>$this->string(255),
            'position'=>$this->integer(),
        ]);
        $this->batchInsert('{{%in_news_types}}',['name_ru','name_ua','name_en','position'],[
                ['Главные новости','Головні новини','Main news',1],
                ['Новости Российских Компаний','Новини Російських Компаній','News of Russian Companies',2],
                ['Новости зарубежных компаний','Новини закордонних компаній','News of foreign companies',3],
                ['События','Події','Events',4],
                ['Статьи','Cтатті','Articles',5],
                ['Аналитика','Аналітика','Analytics',6],
                ['Акции','Акції','Promotions',7],
                ['Репортажи', 'Репортажі','Reports',8],
                ['Видео','Відео','Video',9],
                ['Презентации','Презентації','Presentations',10],
                ['Фото','Фото','Photo',11],
                ['Новое в базе знаний','Нове в базі знань','New in Knowledge Base',12],
            ]
        );
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('in_news_types');
    }
}
