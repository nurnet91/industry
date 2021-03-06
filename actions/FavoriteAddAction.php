<?php

namespace app\actions;


use app\models\Comments;
use app\models\Users;
use Yii;
use yii\base\Action;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * Class ViewCountersAction
 * @package common\modules\actions
 * @frontend ```HTML
 * <a href="#" data-type="100" data-id="12">Like</a>
 */
class FavoriteAddAction extends Action
{
    public $modelClassName;
    public $relationName;
    public $requestName = "id";
    private $_error;
    private $_success;
    private $_model;
    private $_class;
    private $_text;
    private $_classRemove;
    /**
     * @return void
     */
    public function run()
    {

        if($this->turn){
            $this->user->unlink($this->relationName,$this->model,true);
            $this->responseText = t('В избранное');
            $this->class = 'button_red';
            $this->classRemove = 'button_green';
            $this->success = 'удачно';
        }else{

            $this->user->link($this->relationName,$this->model);
            $this->responseText = t('Убрат из избранных');
            $this->class = 'button_green';
            $this->classRemove = 'button_red';
            $this->success = 'удачно';
        }
        return $this->messages;
    }

    public function init()
    {
        $model = $this->modelClassName;
        $id = Yii::$app->request->get('id');
        $this->model  = $model::find()->where(['id'=>$id])->one();
        if(empty($this->model)){
            $this->error = "Model not found";
            return $this->messages;
        }
    }

    /**
     * @return array
     */
//    public function afterRun()
//    {
//        parent::afterRun(); // TODO: Change the autogenerated stub
//        return $this->messages;
//    }

    public function getUser(){
        return Users::find()->self()->joinWith('favorites')->one();
    }


    /**
     * @return bool
     */
    public function beforeRun()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        parent::beforeRun(); // TODO: Change the autogenerated stub
//        if (!Yii::$app->request->isAjax) {
//            return false;
//        }
//        if (!Yii::$app->user->isGuest) {
//            return false;
//        }
//        if ( Yii::$app->request->post() == null) {
//            return false;
//        }
        return true;
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
    public function getMessages(){
        return [
            'error' => $this->error,
            'success' => $this->success,
            'text'=>$this->responseText,
            'classAdd'=>$this->class,
            'classRemove'=>$this->classRemove
        ];
    }
    public function getClass(){
        return $this->_class;
    }
    public function setClass($value){
        return  $this->_class = $value;
    }

    public function getClassRemove(){
        return $this->_classRemove;
    }
    public function setClassRemove($value){
        return $this->_classRemove = $value;
    }
    public function getResponseText(){
        return $this->_text;
    }
    public function setResponseText($value){
        return $this->_text = $value;
    }

    /**
     * @return mixed
     */
    public function getModel(){
        return $this->_model;
    }
    public function setModel($value){
        return $this->_model = $value;
    }

    /**
     * @return bool
     */
    public function getTurn(){

        $favorites= $this->user->{$this->relationName};
        if($favorites){
            $users = ArrayHelper::getColumn($favorites,"id");
            if(in_array($this->model->id,$users)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}
