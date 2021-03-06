<?php

namespace app\actions;


use Yii;
use yii\base\Action;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class OneToOneEditAction extends Action
{
    /**
     * Атррибут для модел метод ClassName; например modelClassName =>Model::className
     */
    public $modelClassName;
    /*
     * Аттрибут для динамического моделя
     */
    private $_model;

    /**
     * @return bool
     */
    public function beforeRun()
    {
        parent::beforeRun(); // TODO: Change the autogenerated stub
        if (Yii::$app->user->isGuest){ throw new NotFoundHttpException('The requested page does not exist.');}
        if (empty($this->modelClassName)){ throw new NotFoundHttpException('The requested page does not exist.');}
        if (!$this->model->load(Yii::$app->request->post())){ throw new NotFoundHttpException('The requested page does not exist.');}
        return true;
    }

    public function init()
    {
        $this->model = new $this->modelClassName();
    }

    /**
     * @return mixed данная функция главное для исползованые
     *
     */

    public function run(){
        if($this->model->save()) {
            Yii::$app->session->setFlash('nmessage', t('Successfuly'));
        }
        return $this->referer;
    }




    /**
     * @return \yii\web\Response
     */
    public function getReferer() {
        return Yii::$app->controller->redirect(!empty(Yii::$app->request->referrer) ? Yii::$app->request->referrer : '/');
    }

    /**
     * @return mixed
     */
    public function getModel(){
        return $this->_model;
    }

    /**
     * @param $value
     * @return mixed
     */
    public function setModel($value){
        return $this->_model = $value;
    }


}