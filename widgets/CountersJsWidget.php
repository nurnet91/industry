<?php

namespace app\widgets;


use yii\base\Widget;

class CountersJsWidget extends Widget
{
    public $findClass = 'comment-likes-button';
    public $data='comment_id';
    public $countClass='counters';
    public $url='/main/add-likes';
    public $requestData='comment_id';
    public function run()
    {
        $this->Js();
    }
    public function Js(){
        $js = <<<JS
            $('.$this->findClass').on('click',function() {
            var _this = $(this);
            var comment_id = _this.data('$this->data');
                $.ajax({
                  type: 'POST',
                  url: '$this->url',
                  data: {id:comment_id},
                  success: function(data){
                      _this.find('.$this->countClass').text(data.count);
                  }
                });                          
            });
JS;
        $this->view->registerJs($js);

    }

}