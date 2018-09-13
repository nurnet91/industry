<?php

namespace app\actions;


use Yii;
use yii\base\Action;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class ManyToOneDeleteAjaxAction extends Action
{
    /**
     * Атррибут для модел метод ClassName; например modelClassName =>Model::className
     */
    public $modelClassName;
    /*
     * Аттрибут для динамического моделя
     */
    private $_model;

    public $request;

    public $findAttribute;
    /*
    * Аттрибут для ошибки например $this->error = 'не удачно'
    */
    private $_error;
    /*
     * Аттрибут для удачного запроса например $this->success = 'удачно";
     */
    private $_success;


    /**
     * @return bool
     * @throws NotFoundHttpException
     */
    public function beforeRun()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return true;
    }
    public function Validate(){
        if (Yii::$app->user->isGuest){return false;}
        if (empty($this->modelClassName)){return false;}
        if (!Yii::$app->request->isAjax){return false;}
        if (Yii::$app->request->post($this->request) == null){return false;}
        if (!$this->model->load(Yii::$app->request->post())){return false;}
        return true;
    }

    public function init()
    {   $model = new $this->modelClassName();
        $this->model = $model::find()->where([$this->findAttribute=>Yii::$app->request->post($this->request)])->andWhere(['user_id'=>Yii::$app->user->id])->one();
        if(empty($this->model)){ $this->_error = "Ошибка при поиске данных"; return $this->message;}
    }

    /**
     * @return mixed данная функция главное для исползованые
     *
     */

    public function run(){
        if($this->model->delete()){
            $this->_success = 'данные удачно удалилис';
        }else{
            $this->_error = 'данные не удалились что то не так!!!';
        }
       return $this->message;
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
      /**
       * @return mixed
       */
    public function getError(){
        return $this->_error;
    }

    /**
     * @param $value
     * @return mixed
     */
    public function setError($value){
        return $this->_error = $value;
    }

    /**
     * @return mixed
     */
    public function getSuccess(){
        return $this->_success;
    }

    /**
     * @param $value
     * @return mixed
     */
    public function setSuccess($value){
        return $this->_success = $value;
    }

    /**
     * @return array
     */
    public function getMessage(){
        return [
            'success'=>$this->success,
            'error'=>$this->error,
        ];
    }

}