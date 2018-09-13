<?php

namespace app\widgets;


use yii\base\Widget;

class ActivityAnalyticWidget extends Widget
{
    public $id = 'highchart-spiderweb';
    private $_options=[];

    public function run()
    {
        $model = '';
        $this->js();
        return $this->render('activity-analytic',['model'=>$model,'attributes'=>$this->attributes]);
    }

    public function getAttributes(){
        return [
            'id'=>$this->id,
            'options'=>$this->options,
        ];
    }
    public function getOptions(){
        return $this->_options[0];
    }
    public function setOptions($value){
        return array_push($this->_options,$value);
    }
    public function getCategories(){
        if(array_key_exists('categories',$this->options)){
            $category = $this->options['categories'];
            foreach($category as $item=> $value){
                $array[$item] = "'$value'";
            }
            return implode(",",$array);
        }
        return false;
    }
    public function getData(){
        if(array_key_exists('data',$this->options)){
            $data = $this->options['data'];
            return implode(",",$data);
        }
        return false;
    }
    public function getSeriesName(){
        if(array_key_exists('data',$this->options)){
            return $this->options['name'];
        }
        return false;
    }

    public function js()
    {
        $this->view->registerJs("if ($('#".$this->id."').length ) {
            var myChart = Highcharts.chart('".$this->id."', {

                chart: {
                    polar: true,
                    type: 'line'
                },

                title: {
                    text: '',
                    x: -80
                },

                pane: {
                    size: '80%'
                },

                xAxis: {
                    categories: [".$this->categories."],
                    tickmarkPlacement: 'on',
                    lineWidth: 0
                },

                yAxis: {
                    gridLineInterpolation: 'polygon',
                    lineWidth: 0,
                    min: 0
                },
              

                // legend: {
                //     align: 'right',
                //     verticalAlign: 'top',
                //     y: 70,
                //     layout: 'vertical'
                // },

                series: [{
                    name: '".$this->seriesName."',
                    data: [".$this->data."],
                    pointPlacement: 'on'
                }] 

            });

        }");


//        tooltip: {
//        shared: true,
//                    pointFormat: '<span style=\"color:{series.color}\">{series.name}: <b>${point.y:,.0f}</b><br/>'
//                },
    }
}