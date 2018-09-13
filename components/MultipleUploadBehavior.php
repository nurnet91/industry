<?php 

namespace app\components;

use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

	class MultipleUploadBehavior extends Behavior {

		public $attribute;
		public $column;
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
                $this->owner->{$this->attribute} = UploadedFile::getInstances($this->owner, $this->attribute);
            }
        }

    	public function afterValidate($event) {

    		if ($this->owner->{$this->attribute}) {

    			$this->uploadFile();

    			$this->owner->{$this->attribute} = null;

    		}

    	}

    	public function afterDelete($event) {

    		$this->deleteFile();

    	}


        public function uploadFile()
        {
            $path = $this->path;
            $name = '';

            FileHelper::createDirectory($path);

            foreach ($this->owner->{$this->attribute} as $key => $file) {
                $uniName = $path . '/' . rand() . uniqid() . time() . '.' . $file->extension;
                $name .= $uniName . (((count($this->owner->{$this->attribute})) > 1 && $key + 1 < count($this->owner->{$this->attribute})) ? ',' : '');

                $file->saveAs($uniName);
            }

            $this->deleteFile();

            $this->owner->{$this->column} = $name;

    	}

    	public function deleteFile() {
	        if (!empty($this->owner->{$this->column})) {
	            foreach (explode(',', $this->owner->{$this->column}) as $file){
                    @unlink($file);
                }
            }
	    }
		
	}

?>