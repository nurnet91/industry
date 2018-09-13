<?php

namespace app\widgets;


use app\models\Users;
use yii\base\Widget;

class LastCompanyWidget extends Widget
{
    public function run()
    {
        $models =  Users::find()->company()->limit(4)->orderBy(['id'=>SORT_DESC])->joinWith('companyinfo')->region()->country()->all();

        return $this->render('last-company',['models'=>$models]);
    }
}