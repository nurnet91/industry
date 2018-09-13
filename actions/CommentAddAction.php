<?php

namespace app\actions;


use app\models\CommentForm;
use app\models\Comments;
use app\models\News;
use Yii;
use yii\base\Action;
use yii\web\Controller;
use yii\web\Response;

class CommentAddAction extends Action
{
    private $_model;
    public $modelClassName;
    public $relationName;
    private $_id;
    /*
* Аттрибут для ошибки например $this->error = 'не удачно'
*/
    private $_error;
    /*
     * Аттрибут для удачного запроса например $this->success = 'удачно";
     */
    private $_success;
    public function init()
    {
        parent::init();
    }

    public function run($id)
    {
        if($id  === null){return $this->referer;}
        if(!$this->findModel($id)){return $this->referer;}
        if($this->save){
            $this->link;
        }
        $this->referer;
    }
    public function findModel($id){
        $this->id = $id;
        $modelClassName = $this->modelClassName;
        $this->modelClassName = $modelClassName::findOne($this->id);
        if(!empty($modelClassName)){
           return true;
        }
        return false;
    }
    public function getLink(){
        $this->modelClassName->link($this->relationName,$this->model);
    }
    public function getId(){
        return $this->_id;
    }
    public function setId($value){
        return $this->_id = $value;
    }
    public function getSave(){
        $form = new CommentForm();
        if($form->load(Yii::$app->request->post()) && $form->validate()) {
            $model = new Comments();
            $model->setAttributes($form->attributes);
            $model->save();
            $this->model = $model;
            return true;
        }
        return false;
    }

    public function getModel(){
        return $this->_model;
    }
    public function setModel($value){
        return $this->_model = $value;
    }
    public function getReferer() {
        return Yii::$app->controller->redirect(!empty(Yii::$app->request->referrer) ? Yii::$app->request->referrer : '/');
    }
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
