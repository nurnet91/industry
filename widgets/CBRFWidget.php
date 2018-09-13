<?php

namespace app\widgets;


use app\components\CBRF;
use yii\base\Widget;

class CBRFWidget extends Widget
{
    private $cbrf;
    public function __construct(CBRF $cbrf,array $config = [])
    {
        parent::__construct($config);
        $this->cbrf = $cbrf;
    }

    public function run(){
        parent::run();
        $model = $this->cbrf->filter(['currency' => $this->array])
            ->withDynamic(['date_from' => time()-(86400*7), 'date_to' => time()])
            ->cache()
            ->all();
        return $this->render('cbrf',['model'=>$model]);
    }


    public function getArray(){
        return [
            'USD',
            'EUR',
            'GBP',
            'UAH',
        ];
    }

}