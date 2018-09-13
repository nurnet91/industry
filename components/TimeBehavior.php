<?php 

namespace app\components;

use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

	
	class TimeBehavior extends Behavior {
		
		public function events() {

	        return [

	            ActiveRecord::EVENT_BEFORE_UPDATE => 'beforeUpdate',

	        ];

	    }

	    public function beforeUpdate($event) {

	    	$this->owner->updated_at = date("Y-m-d H:i:s", strtotime('now'));
        	
    	}
		
	}

?>