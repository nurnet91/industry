<?php

namespace app\actions;


use app\models\CompanyProfileAboutDirectors;
use Yii;
use yii\base\Action;
use yii\web\Response;

class ManyToManyDeleteAjaxActionForCompanyProfile extends Action
{
    /**
     * Атррибут для модел метод ClassName; например modelClassName =>Model::className
     */
    public $modelClassName;

    public $relationName;

    /*
     * Аттрибут для динамического моделя
     */
    private $_model;

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
        if (empty($this->modelClassName)){return false;}
        if (!Yii::$app->request->isAjax){return false;}
        if(Yii::$app->request->post('id') == null){return false;}
        return true;
    }
    public function init()
    {
        $model = new $this->modelClassName;
        $this->model = $model::findOne((int)Yii::$app->request->post('id'));
    }

    /**
     * @return mixed данная функция главное для исползованые
     *
     */

    public function run(){

        $relationName = $this->relationName;

        if($this->relationName == 'companiesAbout')
        {
            foreach ($this->model->aboutDirectors as $aboutDirector){
                $this->model->unlink('aboutDirectors', $aboutDirector,true);
            }
        }

        if(!$this->model->unlink($this->relationName,$this->model->$relationName,true) && $this->model->delete()){
            $this->_success = 'Данные успешно удалены';
        }else{
            $this->_error = 'Ошибка! Запись не удалена!';
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