<?php

namespace app\components;


use yii\base\Behavior;
use yii\db\ActiveRecord;

class DataLinkBehaviors extends Behavior
{
    public $modelClassName;
    private $_model;
    public function event() {

        return [

            ActiveRecord::EVENT_AFTER_INSERT => 'add',

        ];

    }
    public function init()
    {
        $this->model = new $this->modelClassName();
    }

    public function add(){
        $model = new $this->model();
        if($model->load(\Yii::$app->request->post())){
            $model->save();
        }
    }
    public function getModel(){
        return $this->_model;
    }
    public function setModel($value){
        return $this->_model = $value;
    }

}