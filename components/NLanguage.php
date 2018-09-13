<?php 

	namespace app\components;

	use yii\base\Component;
	use Yii;

	class NLanguage extends Component {
		
		public function init() {

			$session 	= Yii::$app->session;

			$languages 	= Yii::$app->params['languages'];


			if ($session->has('nlanguage')) {

				Yii::$app->language = $session->get('nlanguage');

			} else{

				Yii::$app->language = 'ru';

				$session->set('nlanguage', Yii::$app->language);

			}

			parent::init();
			
		}
		
	}