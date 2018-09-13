<?php

namespace app\widgets;


use app\models\Directions;
use app\models\Reviews;
use yii\base\Widget;

class SubscribeWidget extends Widget
{
    public $tpl;
    public $interests;
    public function init()
    {
        if(empty($this->tpl)){
            $this->tpl = 'subscribe-home';
        }
        //TODO не доканца сделано и валидитаци нету если уже подписано она заного посписивает кароч много дел сначало надо тестироват
        if(empty($this->interests)){
            $this->interests = Directions::find()->active()->all();
        }
    }
    public function run()
    {
        $this->Js();
        return $this->render($this->tpl,['interests'=>$this->interests]);
    }



    public function Js(){
        $this->view->registerJs("
    
    $('#subsMail').on('input keyup', function () {
        var email = $('#subsMail').val();
        var errorMail = document.getElementById('email_error');

        

        if (validateEmail(email)) {
            errorMail.setAttribute('hidden', 'hidden');
        }else{
            errorMail.removeAttribute('hidden')
        }
    });
    
    $('#email_error').click(function () {
        this.setAttribute('hidden', 'hidden');
    });
    
    $('#name_error').click(function () {
        this.setAttribute('hidden', 'hidden');
    });
    
    $('#subsName').on('input keyup', function () {
        var name = $('#subsName').val();
        var errorSpan = document.getElementById('name_error');

        if (name !== '') {
            errorSpan.setAttribute('hidden', 'hidden');
        }else{
            errorSpan.removeAttribute('hidden')
        }
    });
    
    $('#validateMail').click(function(){
        var email = $('#subsMail').val();
        var name = $('#subsName').val();
        var errorName = document.getElementById('name_error');
        var errorMail = document.getElementById('email_error');

        if (!validateEmail(email) && name === '') {
            errorMail.removeAttribute('hidden');
            errorName.removeAttribute('hidden');
            
            this.removeAttribute('data-fancybox');
            this.removeAttribute('data-src');
            this.removeAttribute('data-modal');
        }else if(name === ''){
            errorName.removeAttribute('hidden');
            
            this.removeAttribute('data-fancybox');
            this.removeAttribute('data-src');
            this.removeAttribute('data-modal');
        }else if(!validateEmail(email)){
            errorMail.removeAttribute('hidden');
        
            this.removeAttribute('data-fancybox');
            this.removeAttribute('data-src');
            this.removeAttribute('data-modal');
        }else{
            this.setAttribute('data-fancybox', '');
            this.setAttribute('data-src', '#subscribe-modal');
            this.setAttribute('data-modal', 'true');
            
            errorName.setAttribute('hidden', 'hidden');
            errorMail.setAttribute('hidden', 'hidden');
        }
    });

    $('#SubsForm2').submit(function(event){
        event.preventDefault();
      	var t = $(this);
      	var t2 = $('#SubsForm');
      	var data2 = t.serialize() + '&' + t2.serialize();
        $.ajax({
            type: 'post',
            url: '/main/subscribers',
            data: data2,
            dataType: 'json', 
            success: function (data) {
            	console.log(data);
                if(data.status > 0){
                	alert('Подписка оформлена');
                    location.reload();
                } else {
                	alert(data.message);
                }
            }
        });
    });

");
    }
}