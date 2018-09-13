<?php

namespace app\widgets;


use app\models\Webinars;
use yii\base\Widget;

class WebinarsFormWidget extends Widget
{


    public function run()
    {  $model = new Webinars();
       return $this->render('webinars',compact('model'));
    }

}