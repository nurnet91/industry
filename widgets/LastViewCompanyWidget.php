<?php

namespace app\widgets;


use app\models\CompanyInfo;
use app\models\Users;
use yii\base\Widget;

class LastViewCompanyWidget extends  Widget
{
        public function run()
        {
            $model = Users::find()->self()->seen()->one();
            return $this->render('last-view-company',['model'=>$model]);
        }
}