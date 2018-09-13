<?php 

namespace app\components;

use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;
	
	class ImgUploadBehavior extends Behavior {
		
		public function event() {

			return [

				ActiveRecord::EVENT_AFTER_VALIDATE => 'myBeforeValidate',
				ActiveRecord::EVENT_BEFORE_INSERT => 'upload',

			];
			
		}
		// public function beforeRun(){
		// 	if(!empty(qewqw)){return false;}
		// }
		public function run(){
			dd("ASDfasdfjasdf");
		}
		public function upload (){

			$model = $this->owner;

			dd($model);

			// $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

            if ($model->imageFile && $model->validate()) {

                if ($this->upload) {

                    $model->imageFile = null;

                    $model->save(false);

                }

            }
		}
		public function myBeforeValidate(){

			dd("ASDfasjlkdfhaksjdfhakjsdfhajksdfhakjsdfhkjasdhfkjas");

			$this->owner->imageFile = UploadedFile::getInstance($this->owner, 'imageFile');

		}
		public function getUpload() {
			$_this = $this->owner;

	        if ($_this->validate()) {

	            $path = 'uploads/reviews';

	            $name = $path . '/' . rand() . uniqid() . time() . '.' . $_this->imageFile->extension;

	            FileHelper::createDirectory($path);

	            $_this->imageFile->saveAs($name);

	            $this->deletePhoto();

	            $_this->author_photo = $name;

	            return true;

	        } else {

	            return false;

	        }

	    }

	    public function deletePhoto() {
	    	$_this = $this->owner;

	        if (!empty($_this->author_photo)) {

	            unlink($_this->author_photo);

	        }

	    }
		
	}

?>