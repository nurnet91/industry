<?php

use yii\db\Migration;

/**
 * Class m180713_060151_create_in_news_likes
 */
class m180713_060151_create_in_news_likes extends Migration
{
    public function safeUp()
    {
        $this->createTable('in_news_likes', [
            'new_id' => $this->integer(),
            'user_id'=>$this->integer()
        ]);
    }
    public function safeDown()
    {
        $this->dropTable('in_news_likes');
    }
}
