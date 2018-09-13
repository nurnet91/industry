<?php

namespace app\widgets;


use app\models\Reviews;
use yii\base\Widget;

class WeareTrustedWidget extends Widget
{
    public function run()
    {
        $reviews = Reviews::findByLan()->all();
        return $this->render('we-are-trusted',['reviews'=>$reviews]);
    }

}