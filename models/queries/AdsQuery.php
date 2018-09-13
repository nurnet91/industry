<?php

namespace app\models\queries;


use app\models\CompanyAds;
use yii\db\ActiveQuery;

class AdsQuery extends ActiveQuery
{
    public function active(){
        return $this->andWhere(['in_ads.status'=>CompanyAds::STATUS_ACTIVE]);
    }


}