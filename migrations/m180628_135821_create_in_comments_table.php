<?php

use yii\db\Migration;

/**
 * Handles the creation of table `in_comments`.
 */
class m180628_135821_create_in_comments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function create_fk_om($table,$table_pk,$relation_table,$relation_table_pk,$has_primary_key = true,$ifdelete = "CASCADE"){

        $tables = $table.$relation_table;
        $this->createIndex(
            'idx-'.$tables.'-'.$relation_table_pk,
            '{{%'.$table.'}}',
            '[['.$table_pk.']]'
        );
        if($has_primary_key){
            $this->addPrimaryKey(
                'pk-'.$tables.'-'.$relation_table_pk,
                '{{%'.$table.'}}',
                '[['.$table_pk.']]'
            );
        }
        //Создание отношение
        $this->addForeignKey(
            'fk-'.$tables.'-'.$relation_table_pk,
            '{{%'.$table.'}}',
            '[['.$table_pk.']]',
            '{{%'.$relation_table.'}}',
            '[['.$relation_table_pk.']]',
            $ifdelete
        );
    }
    public function safeUp()
    {
        $this->createTable('in_comments', [
            'id' => $this->primaryKey(),
            'user_id'=>$this->integer(),
            'description'=>$this->text(),
            'title'=>$this->string(255),
            'status'=>$this->tinyInteger(4),
            'rating'=>$this->integer(),
            'parent_id'=>$this->integer(),
            'created_at'=>$this->timestamp(),
        ]);
        $this->create_fk_om('in_companies_webinars','company_id','in_company_info','id',false);
        $this->create_fk_om('in_companies_webinars','webinar_id','in_webinars','id',false);
        $this->create_fk_om('in_webinars_comments','comment_id','in_comments','id',false);
        $this->create_fk_om('in_webinars_comments','webinar_id','in_webinars','id',false);
        $this->create_fk_om('in_webinars_participants','user_id','in_users','id',false);
        $this->create_fk_om('in_webinars_participants','webinar_id','in_webinars','id',false);
        $this->create_fk_om('in_webinars_likes','user_id','in_users','id',false);
        $this->create_fk_om('in_webinars_likes','webinar_id','in_webinars','id',false);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('in_comments');
    }
}
