<?php

namespace app\components;


use app\models\adsFiles;
use app\models\Files;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

class FileUploadBehavior extends Behavior
{
    public $dataFile;
    public $file;
    public $path;
    public $relationName;
    public $modelClassName;
    public $url;
    public $uploadedFileFunction = true;

    public function events() {

        return [

            ActiveRecord::EVENT_BEFORE_VALIDATE => 'beforeValidate',
            ActiveRecord::EVENT_AFTER_INSERT => 'afterValidate',
            ActiveRecord::EVENT_AFTER_DELETE => 'afterDelete',
        ];

    }

    public function beforeValidate($event) {
        if($this->uploadedFileFunction == true){
            $this->owner->{$this->dataFile} = UploadedFile::getInstances($this->owner, $this->dataFile);
        }

    }


    public function afterValidate($event) {
        if (!empty($this->owner->{$this->dataFile})) {
            foreach($this->owner->{$this->dataFile} as $file) {
                if (!empty($file)) {
                    $this->uploadFile($file);
                }
            }
        }
    }
    public function afterDelete(){
        $files =  $this->owner->{$this->relationName};
        foreach ($files as $file){
            $this->deleteFile($file);
            $this->owner->unlink($this->relationName,$file);
        }
    }


    public function uploadFile($file) {
        $this->owner->link($this->relationName,$this->createFile($file));
    }
    public function createFile($file){
        $name = $this->path . '/' . rand() . uniqid() . time() . '.' . $file->extension;
        FileHelper::createDirectory($this->path);
        $model = $this->Model();
        $model->{$this->url} = $name;
        $file->saveAs($name);
        $model->save();
        return $model;
    }

    public function deleteFile($file) {

        if (!empty($file)) {

            @unlink($file);

        }

    }

    public function Model(){
        $className = $this->modelClassName;
        $newFile = new $className();
        return $newFile;
    }


}