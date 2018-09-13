<?php

namespace app\widgets;


use app\models\News;
use yii\base\Widget;

class SaleSectionWidget extends Widget
{
    public function run()
    {
        $model = News::find()->active()->type(News::SALE_ADVERTISEMENT)->sortDesc()->limit(3)->all();
        return $this->render('sale-section',['model'=>$model]);
    }

}