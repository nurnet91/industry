<?php

namespace app\widgets;


use app\models\News;
use yii\base\Widget;

class NewsTypeWidget extends Widget
{
    public $type;
    public $text;
    public $singleId;
    public function init()
    {
        if(empty($this->type)){
            $this->type = 1;
        }
        if(empty($this->text)){
            $this->text = t('Новости');
        }
    }

    public function run()
    {
        $model = News::find()->active()->type($this->type)->andWhere(['!=','in_news.id',$this->id])->user()->limit(3)->all();
        return $this->render('news-type',[
            'type'=>$this->type,
            'model'=>$model,
            'text'=>$this->text
        ]);

    }


}