<?php

namespace app\widgets;


use yii\base\Widget;

class FavoriteAddJsWidget extends Widget
{
    public $findClass = 'comment-likes-button';
    public $data='comment_id';
    public $responseClass='counters';
    public $url='/main/add-likes';
    public $requestData='comment_id';
    public function run()
    {
        $this->view->registerJs($this->Js());
    }
    public function Js(){
      return  $js = <<<JS
            $('.$this->findClass').on('click',function() {
            var _this = $(this);
            var favorite = _this.data('$this->data');
                $.ajax({
                  type: 'GET',
                  url: '$this->url',
                  dataType:'json',
                  data: {id:favorite},
                  success: function(data){
                      var responseClass =  $('.$this->responseClass');
                      responseClass .text(data.text);
                      responseClass.removeClass(data.classRemove);
                      responseClass.addClass(data.classAdd);
                  }
                });                          
            });
JS;
    }

}