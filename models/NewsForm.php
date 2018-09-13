<?php

namespace app\models;


use Yii;
use yii\base\Model;

class NewsForm extends Model
{
    /**
     * {@inheritdoc}
     */
    public $imageFile;
    public $title_ru;
    public $anotation_ru;
    public $anotation_en;
    public $anotation_ua;
    public $text_ru;
    public $text_en;
    public $text_ua;
    public $title_ua;
    public $title_en;
    public $author;
    public $category_id;
    public $type_id;
    public $authors_list;
    public function rules()
    {
        return [
            [['author'],'string','max'=>255],
            [['anotation_ru'],'string','max'=>1000],
            [['category_id','type_id','anotation_ru','title_ru'],'required'],
            [['category_id','type_id'],'integer'],
            [['text_ru'], 'string'],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'on' => 'create'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'on' => 'update'],
            [['authors_list'],'safe'],
        ];
    }

    public function beforeValidate()
    {
        if($this->title_ru){
            $this->title_ua = $this->title_ru;
            $this->title_en = $this->title_ru;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Direction',
            'type_id' => 'Type',
            'title_ru' => 'Title',
            'text_ru' => 'Text',
            'author'=>'Author',
            'anotation_ru' => 'Annotation'
        ];
    }

}