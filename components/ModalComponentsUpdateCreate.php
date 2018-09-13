<?php

namespace app\components;


use yii\base\Component;

class ModalComponentsUpdateCreate extends Component
{


    public $mainId;

    public $viewName;

    public $mainSrc;

    public $indidualClass;

    public $modalClass;

    public $formId;

    public $actionEdit;

    public $actionUpdate;

    public $actionResponse;

    public $direction;


    public $inputsId;

    public function __construct($mainId, $viewName, $mainSrc, $indidualClass, $modalClass, $formId, $actionEdit, $actionUpdate, $actionResponse, $inputsId,$direction= null, array $config = [])
    {
        parent::__construct($config);
        $this->mainId = $mainId.$direction;
        $this->viewName = $viewName.$direction;
        $this->mainSrc = $mainSrc.$direction;
        $this->indidualClass = $indidualClass.$direction;
        $this->modalClass = $modalClass.$direction;
        $this->formId = $formId.$direction;
        $this->actionEdit = $actionEdit;
        $this->actionResponse = $actionResponse;
        $this->actionUpdate = $actionUpdate;
        $this->inputsId = $inputsId.$direction;
    }

    public function modalClasses()
    {
        echo $this->modalClass;
    }

    public function mainButton()
    {

        echo '<sup>
                <button class="edit"  hidden="true" data-fancybox="" id="' . $this->mainId . '" data-src="#' . $this->mainSrc . '" data-modal="true" data-toggle="tooltip" data-placement="top" title="Нажав на данный значок вы можете редактировать графу, которой он принадлежит">
                     <i class="fa fa-pencil-square-o  color-blue" aria-hidden="true">
                     </i>
                </button>
             </sup>
             <sup>
                <button class="edit create_'.$this->viewName.'" data-event="'.$this->mainSrc.'"  title="Нажав на данный значок вы можете редактировать графу, которой он принадлежит">
                    <i class="fa fa-pencil-square-o  color-blue" aria-hidden="true">
                    </i>
                </button>
            </sup>
            ';
    }

    public function indidualButton($model)
    {
        echo '<a href="#" class="edit" id="' . $this->viewName . $model->id . '_' . $model->id . '" data-fancybox="" data-src="#' . $this->viewName . $model->id . '" 
                data-modal="true" data-toggle="tooltip" data-placement="top" title="" hidden="true">
             </a>
             <a href="#" class="edit ' . $this->indidualClass . '" data-id="' . $model->id . '" data-event="' . $this->viewName . '"  
                title="" data-original-title="Нажав на данный значок вы можете редактировать графу, которой он принадлежит">
                 <i class="fa fa-pencil-square-o  color-blue" aria-hidden="true">
                 </i>
             </a>';

    }


    public function script()
    {
        return "
            $('.create_" . $this->viewName . "').click(function() {
                var _this = $(this);
                var data_src =_this.data('event');
                $('." . $this->modalClass . "').attr('id',data_src);
                var form = $('#" . $this->formId . "');
                form[0].reset();
                form.attr('action','" . $this->actionEdit . "');
                $('#" . $this->mainId . "').trigger('click');
            });
            
            $('." . $this->indidualClass . "').click(function(){
                    var _this = $(this);
                    console.log(this);
                    var data_src =_this.data('event');
                    var data_id = _this.data('id');
                    $('." . $this->modalClass . "').attr('id',data_src+data_id);
                    $('#'+data_src+data_id).find('form').attr('action','" . $this->actionUpdate . "');
                
                    var id = $('#'+data_src+data_id+'_'+data_id);
                    id.trigger('click');
                    });";
    }
//$.ajax({
//type:'post',
//url:'" . $this->actionResponse . "',
//data:{data_id:data_id},
//success: function(data){
//    $.each(data, function(key,value) {
//        console.log(value);
//        $('#" . $this->inputsId . "-'+key).val(value);
//    });
//}
//});

}