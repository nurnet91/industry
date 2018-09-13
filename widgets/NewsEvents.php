<?php

namespace app\widgets;


use app\models\News;
use yii\base\Widget;

class NewsEvents extends Widget
{
    public $direction;
    private $event;
    public function init()
    {
        if(!empty($this->direction)){
            $this->event = News::find()->direction($this->direction)->events()->sortDesc()->active()->limit(5)->all();
        if(empty($this->event)){
            $this->event = News::find()->events()->active()->sortDesc()->limit(5)->all();
        }else
            $this->event = News::find()->events()->active()->sortDesc()->limit(5)->all();
        }
    }

    public function run(){
        return $this->render('news-events',['events'=>$this->event]);
    }
}