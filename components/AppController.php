<?php 

namespace app\components;

use Yii;
use yii\web\Controller;

class AppController extends Controller {

	public $layout = 'layout_index';

	public function goReferer() {
		return $this->redirect(!empty(Yii::$app->request->referrer) ? Yii::$app->request->referrer : '/');
	}

}