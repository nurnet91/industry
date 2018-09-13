<?php

namespace app\components;


use Yii;
use yii\base\Component;

class ModalComponents extends Component
{   
    public $mainId;

    public $viewName;

    public $mainSrc;

    public $individualClass;

    public $modalClass;

    public $formId;

    public $actionEdit;

    public $actionUpdate;

    public $actionResponse;

    public $inputsId;

    public $deleteClass;

    public $actionDelete;

    public $scenario;

    public function __construct($mainId,$viewName,$mainSrc,$individualClass,$modalClass,$formId,$actionEdit,$actionUpdate,$actionResponse,$inputsId,$deleteClass,$actionDelete, array $config = [])
    {
        parent::__construct($config);
        $this->mainId = $mainId;
        $this->viewName = $viewName;
        $this->mainSrc = $mainSrc;
        $this->individualClass = $individualClass;
        $this->modalClass = $modalClass;
        $this->formId = $formId;
        $this->actionEdit = $actionEdit;
        $this->actionResponse = $actionResponse;
        $this->actionUpdate = $actionUpdate;
        $this->inputsId = $inputsId;
        $this->deleteClass = $deleteClass;
        $this->actionDelete = $actionDelete;
    }
    public function modalClasses()
    {
        echo $this->modalClass;
    }

    public function mainButton()
    {
        echo '<sup>
                <button class="edit"  hidden="true" data-fancybox="" id="'.$this->mainId.'" data-src="#'.$this->mainSrc.'" data-modal="true" data-toggle="tooltip" data-placement="top" title="Нажав на данный значок вы можете редактировать графу, которой он принадлежит">
                     <i class="fa fa-pencil-square-o  color-blue" aria-hidden="true">
                     </i>
                </button>
             </sup>
          ';
    }
    public function indidualButton($model)
    {
       echo '<div class="edit" id="'.$this->viewName.$model->id.'_'.$model->id.'" data-fancybox="" data-src="#'.$this->viewName.$model->id.'" 
                data-modal="true" data-toggle="tooltip" data-placement="top" title="" hidden="true">
             </div>
             <div class="edit '.$this->individualClass.'" data-id="'.$model->id.'" data-event="'.$this->viewName.'"  
                title="" data-original-title="Нажав на данный значок вы можете редактировать графу, которой он принадлежит">
                 <i class="fa fa-pencil-square-o  color-blue" aria-hidden="true" style="position: absolute;top: 1px;left: 1px;background: #fff; z-index: 99">
                 </i>
             </div>';

    }
    public function deleteButton($model){
        echo '
        
             <div class="edit '.$this->deleteClass.'" data-id="'.$model->id.'"  
                title="" data-original-title="Удалить запись">
                 <i class="fa fa-remove color-blue" aria-hidden="true" style="position: absolute;top: 1px; right: 1px;background: #fff; z-index: 99">
                 </i>
             </div>
             
        ';
    }


    public $contactLayout = '<div class="company-profile-box__contacts  row  justify-content-between">'.
        '<div class="company-profile-box__contacts-box  col-sm-6  col-lg-4">'.
            '<h4>Основной адрес</h4>'.
            '<div class="company-profile-box__contact-info"><i class="fa fa-map-marker" aria-hidden="true"></i>Неуказано</div>'.
        '</div>'.
        '<div class="company-profile-box__contacts-box  col-sm-6  col-lg-4">'.
            '<h4>Дополнительный адрес</h4>'.
            '<div class="company-profile-box__contact-info"><i class="fa fa-map-marker" aria-hidden="true"></i>Неуказано</div>'.
        '</div>'.
        '<div class="company-profile-box__contacts-box  col-sm-6  col-lg-3">'.
            '<h4>Общие контакты</h4>'.
            '<a href="" class="company-profile-box__contact-info"><i class="seller-window__fa-icon  fa fa-phone" aria-hidden="true"></i>Неуказано</a>'.
            '<a href="" class="company-profile-box__contact-info"><i class="seller-window__fa-icon  fa fa-envelope" aria-hidden="true"></i>Неуказано</a>'.
        '</div>'.
        '<div class="company-profile-box__contacts-box  col-sm-6  col-lg-1">'.
            '<button class="edit create_empl_contact" data-event="empl-contact-new" >'.
                '<i class="fa fa-plus color-blue" aria-hidden="true"></i>'.
            '</button>'.
        '</div>'.
        '</div>';

//<a href="#" class="edit" id="'.$this->viewName.$model->id.'_'.$model->id.'" data-fancybox="" data-src="#'.$this->viewName.$model->id.'"
//data-modal="true" data-toggle="tooltip" data-placement="top" title="" hidden="true">
//</a>
//<a href="#" class="edit '.$this->indidualClass.'" data-id="'.$model->id.'" data-event="'.$this->viewName.'"
//title="" data-original-title="Нажав на данный значок вы можете редактировать графу, которой он принадлежит">
//<i class="fa fa-pencil-square-o  color-blue" aria-hidden="true">
//</i>
//</a>

    public function script()
    {
        return  "
            $('.create_".$this->viewName."').click(function() {
                var _this = $(this);
                var direction  = $(this).closest('.tabs-section__in').find('.direction_id').attr('id');
                var theme_id  = $(this).closest('.tabs-section__pane').find('.theme_id').attr('id');
                var data_src =_this.data('event');
                $('.".$this->modalClass."').attr('id',data_src);
                var form = $('#".$this->formId."');
                form[0].reset();
                form.find('#". $this->inputsId ."-direction_id').attr('value', direction);
                form.find('#". $this->inputsId ."-theme_id').attr('value', theme_id);
                form.attr('action','".$this->actionEdit."');
                
                $('#".$this->inputsId."-'+'action').val('create');
                
                $('#".$this->mainId."').trigger('click');
            });
            
            $('.".$this->individualClass."').click(function(){            
                var _this = $(this);
                var data_src =_this.data('event');
                var data_id = _this.data('id');
                $('.".$this->modalClass."').attr('id',data_src+data_id);
                var form =  $('#".$this->formId."');
                form[0].reset();
                form.attr('action','".$this->actionUpdate."');
                
                $('#".$this->inputsId."-'+'action').val('update');
                
                $('#'+data_src+data_id).attr('action','".$this->actionUpdate."');
                 $.ajax({
                    type:'post',
                    url:'".$this->actionResponse."',
                    data:{data_id:data_id},
                    success: function(data){
                        $.each(data, function(key,value) {
                            $('#".$this->inputsId."-'+key).val(value);
                        });
                    }
                 });
                var id = $('#'+data_src+data_id+'_'+data_id);
                id.trigger('click');
            });
        
            $('.".$this->deleteClass."').click(function(){
                    var _this = $(this);
                    var data_id = _this.data('id');
                    var moduleDiv = $(this).closest('.tabs-section__in').find('#".$this->viewName."-' + data_id);
                    $.ajax({
                        type:'post',
                        url:'".$this->actionDelete."',
                        data:{id:data_id},
                        success: function(data){
                            if('".$this->viewName."' == 'empl_contact'){
                                moduleDiv.replaceWith('".$this->contactLayout."');
                            }else{
                                moduleDiv.remove();
                            }
                        }
                         });
                    });
                    
    if('".$this->viewName."' == 'employees'){
        var themes = $(document).find('#companyprofileemployees-themeids');
        var theme = $(document).find('#companyprofileemployees-theme_ids');
        var sub_theme = $(document).find('#companyprofileemployees-sub_theme_ids');
        var sub_themes = $(document).find('#companyprofileemployees-subthemeids');
        var directionInput = $(document).find('#companyprofileemployees-direction_id');
        
        $('.create_employees').click(function() {
        var form = $(document).find('#employee-update');
        form[0].reset();
        theme.val(''); 
        sub_theme.val(''); 
        sub_themes.parent().hide();
        var direction  = $(this).closest('.tabs-section__in').find('.direction_id').attr('id');
        directionInput.val(direction);
            $.ajax({
                 url: '/company/filters?ids='+(direction)+'&model=directions',
                 type: 'get', 
                 dataType: 'html',
                 success: function(data){
                     themes.html(data);
                     $('.multiple-selected-themes').multiselect('rebuild');
                     $('.multiple-selected-themes').multiselect({includeSelectAllOption: true});
                 }
            });
        });
        
        $('.employee-event').click(function() {
            themes.hide();
            sub_themes.parent().hide();
            var direction  = $(this).closest('.tabs-section__in').find('.direction_id').attr('id');
            directionInput.val(direction);
            $.ajax({
                 url: '/company/filters?ids='+(direction)+'&model=directions',
                 type: 'get', 
                 dataType: 'html',
                 success: function(data){
                    themes.html(data);
                    $('.multiple-selected-themes').multiselect('rebuild');
                    $('.multiple-selected-themes').multiselect({includeSelectAllOption: true});
                    $('.multiple-selected-themes').multiselect('select', theme.val().split(','));
                    themes.show();
                    themes.trigger('change');
                 }
            });
        });
    
        themes.on('change', function() {
            var ids = $(this).val().join(',');
            theme.val(ids); 
            $.ajax({
                url: '/company/filters?ids='+ids+'&model=sub_themes',
                type: 'get',
                dataType: 'html',
                success: function(data){
                    if(data){
                        sub_themes.parent().show();
                        sub_themes.html(data);    
                    }else{
                        sub_themes.html('');
                        sub_themes.parent().hide();  
                    }
                    $('.multiple-selected-sub-themes').multiselect('rebuild');
                    $('.multiple-selected-sub-themes').multiselect({includeSelectAllOption: true});
                    $('.multiple-selected-sub-themes').multiselect('select', sub_theme.val().split(','));
                }
            });
        });

        sub_themes.on('change', function() {
            var ids = $(this).val().join(',');
            sub_theme.val(ids); 
        });
    }              
";
     }

}
