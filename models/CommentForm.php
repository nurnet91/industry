<?php

namespace app\models;


class CommentForm extends \yii\base\Model
{
    public $parent_id;
    public $description;
	public $title;

    public function rules()
    {
        return [
            [['description'], 'required'],
            ['description', 'string'],
            [['parent_id'], 'integer'],
            [['title'],'string']
		];
    }
}