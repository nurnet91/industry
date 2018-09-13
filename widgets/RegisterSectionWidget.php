<?php

namespace app\widgets;


use yii\base\Widget;

class RegisterSectionWidget extends Widget
{
    public function run()
    {
        return $this->render('register-section');
    }

}