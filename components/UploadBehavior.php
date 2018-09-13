<?php

namespace app\components;

use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;


class UploadBehavior extends Behavior {

    public $imageFile;
    public $photo;
    public $path;
    public $uploadedFileFunction = true;

    public function events() {

        return [

            ActiveRecord::EVENT_BEFORE_VALIDATE => 'beforeValidate',
            ActiveRecord::EVENT_AFTER_VALIDATE => 'afterValidate',
            ActiveRecord::EVENT_AFTER_DELETE => 'afterDelete',

        ];

    }

    public function beforeValidate($event){
        if($this->uploadedFileFunction == true) {
            $this->owner->{$this->imageFile} = UploadedFile::getInstance($this->owner, $this->imageFile);
        }
    }

    public function afterValidate($event) {

        if ($this->owner->{$this->imageFile}) {

            $this->uploadFile();

            $this->owner->{$this->imageFile} = null;

        }

    }

    public function afterDelete($event) {

        $this->deletePhoto();

    }

    public function uploadFile()
    {

        $path = $this->path;

        $name = $path . '/' . rand() . uniqid() . time() . '.' . $this->owner->{$this->imageFile}->extension;

        FileHelper::createDirectory($path);

        $this->owner->{$this->imageFile}->saveAs($name);

        $this->deletePhoto();

        $this->owner->{$this->photo} = $name;

    }

    public function deletePhoto() {

        if (!empty($this->owner->{$this->photo})) {

            @unlink($this->owner->{$this->photo});

        }

    }

}

?>