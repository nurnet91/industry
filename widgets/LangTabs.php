<?php 

namespace app\widgets;

use yii\base\Widget;
use Yii;

	class LangTabs extends Widget {

		public $w_id;
		public $form;
		public $model;
		public $methods = [];

		public function run() {

			echo $this->header();
			echo $this->content();
			$this->footer();
			
		}

		public function header() {

		   	$txt =  '<ul class="nav nav-tabs" id="'.$this->w_id.'">';

		   	$a = 0;

		   	foreach ($this->lang as $key => $value) {

		   		$class = $a == 0 ? 'active' : '';

		   		$txt .= '<li class="'.$class.'">';

		   		$txt .= '<a href="#'.$key.'_'.$value['id'].'">';

		   		$txt .= $value['name'];

		   		$txt .= '</a>';
		   		
		   		$txt .= '</li>';

		   		$a++;

		   	}

		    $txt .= '</ul>';

		    return $txt;
			
		}

		public function content() {

			$txt = '<div class="tab-content">';

			$a = 0;

			foreach ($this->lang as $key => $value) {

				$class = $a == 0 ? 'active2' : '';

				$txt .= '<div id="' . $key . '_' . $value['id'] . '" class="tab-pane2 ' . $class . '">';

				if (!empty($this->methods)) {

					foreach ($this->methods as $method) {

						if (isset($method['attribute'])) {

							$attr = $method['attribute'] . $key;

							$opt1 = isset($method['fieldOptions']) ? $method['fieldOptions'] : [];

							$input= isset($method['input']) ? $method['input'] : 'textInput';

							$opt2 = isset($method['inputOptions']) ? $method['inputOptions'] : [];

							$txt .= $this->form->field($this->model, $attr, $opt1)->$input($opt2);
							
						} else {

							$txt .= '<div style="padding:15px 0;"><label class="label-danger">Attribute is not found</label></div>';

						}
						
					}
					
				}

				$txt .= '</div>';

				$a++;

		   	}

			$txt .= '</div>';

			return $txt;
			
		}

		public function footer() {

			Yii::$app->view->registerJs('

			    $(".tab-content .tab-pane2").each(function(){
			        $(this).addClass("item2");
			    });

			    $("#'.$this->w_id.' li a").click(function(e){

			        e.preventDefault();

			        var t = $(this);

			        t.parent().addClass("active");
			        t.parent().siblings().removeClass("active");

			        var b_id = t.attr("href");

			        if($(b_id).length > 0){

			            $(b_id).addClass("active2");
			            $(b_id).siblings().removeClass("active2");

			        }

			    });

			');
			
		}

		public function getLang(){

			return 	Yii::$app->params['languages'];
		}

	}
	
?>