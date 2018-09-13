<?php

namespace app\widgets;


use app\models\News;
use yii\base\Widget;

class MostNewsWidget extends Widget
{
    public $event;
    public function init()
    {
        $this->event = News::find()->active()->sortDesc()->user()->limit(3)->all();
    }

    public function run()
    {
        return $this->render('most-news',['model'=>$this->event]);
    }

}