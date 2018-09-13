<?php

namespace app\actions;


use app\models\CompanyInfo;
use Faker\Provider\Company;
use Yii;
use yii\base\Action;
use yii\web\Response;

class ManyToManyResponseAction extends Action
{

    /*
     * Аттрибут для ошибки например $this->error = 'не удачно'
     */
    private $_error;
    /*
     * Аттрибут для удачного запроса например $this->success = 'удачно";
     */
    private $_success;

    private $_model;

    public $modelClassName;

    public function init(){
        $this->model = $this->modelClassName;
    }
    public function beforeRun()
    {
        if(empty($this->modelClassName)){return false;}
        if(!Yii::$app->request->isAjax){return false;}
        if($this->postId() == null){return false;}
        return true;
    }

    public function run(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = $this->model;
        $form = $model::find()->where(['id'=>$this->postId()])->one();
        return $form;
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
     * @return array
     */
    public function getMessage(){
        return [
            'error'=>$this->error,
        ];
    }
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
    public function postId(){
        return  Yii::$app->request->post('data_id');
    }

}