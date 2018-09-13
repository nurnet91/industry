<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\LoginFormAdmin;
use app\models\Users;
use yii\filters\VerbFilter;
use yii\web\Controller;

class DefaultController extends Controller {

	public function behaviors() {
        return [
        	'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex() {

    	if ($this->isAdmin()) {
    	
	        return $this->render('index');
    		
    	} else {

            Yii::$app->user->logout();
            
        }

    	return $this->redirect('/admin/login');

    }

    public function actionLogin() {

    	if ($this->isAdmin()) {
    		
            return $this->redirect('/admin');

        }

        if (!Yii::$app->user->isGuest) {

            Yii::$app->user->logout();
            
	    	return $this->redirect('/admin/login');

        }

    	$model = new LoginFormAdmin();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            $user = $model->getUser();

            $user->last_visit = date("Y-m-d H:i:s", strtotime('now'));

            $user->last_ip = Yii::$app->request->userIP;

            $user->update();

            return $this->redirect('/admin');

        }

        $model->password = '';

        return $this->render('login', ['model' => $model]);
    	
    }

    public function actionLogout() {

        Yii::$app->user->logout();

        return $this->redirect('/admin/login');;

    }

    public function isAdmin() {

    	return (!Yii::$app->user->isGuest AND Yii::$app->user->identity->role_id == Users::ROLE_ADMIN);

    }
    
}
