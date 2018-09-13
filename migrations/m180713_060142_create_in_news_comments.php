<?php

use yii\db\Migration;

/**
 * Class m180713_060142_create_in_news_comments
 */
class m180713_060142_create_in_news_comments extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('in_news_comments', [
            'new_id' => $this->integer(),
            'comment_id'=>$this->integer()
        ]);

    }

}
