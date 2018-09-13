<?php

namespace app\widgets;


use yii\base\Widget;
use yii\helpers\Json;

class TenderAnalyticWidget extends Widget
{
    public $data                = [];
    public $options             = [];
    public function init()
    {
        parent::init();
        $this->data = Json::encode($this->data);
        $this->options = Json::encode($this->options);
    }
    public function run()
    {
        $this->registerScript();
        echo  '<div id="'.$this->registerScript().'" class="highchart-pie"></div>';
    }
    public function registerScript()
    {
        $js = <<< JS
            var ctx = $("#highchart-pie");
            var myChart = new Chart(ctx, {
                data: $this->data,
                options: $this->options
            });
JS;
        \Yii::$app->view->registerJs($js);
    }
}
