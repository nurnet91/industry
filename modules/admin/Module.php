<?php

namespace app\modules\admin;

use Yii;

class Module extends \yii\base\Module {

    public $controllerNamespace = 'app\modules\admin\controllers';

    public function init() {

        parent::init();

        Yii::$app->user->loginUrl = ['/admin/login'];

    }
}
