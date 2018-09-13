<?php

use yii\db\Migration;

/**
 * Class m180627_090322_in_company_testimonials_table
 */
class m180627_090322_in_company_testimonials_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('in_company_testimonials', [
            'id' => $this->primaryKey(),
            'fio'=>$this->string(255),
            'company_name'=>$this->string(255),
            'position'=>$this->string(255),
            'description'=>$this->text(),
            'photo'=>$this->string(255),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180627_090322_in_company_testimonials_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180627_090322_in_company_testimonials_table cannot be reverted.\n";

        return false;
    }
    */
}
