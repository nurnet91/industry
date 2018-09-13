<?php

namespace app\models;


use yii\db\ActiveQuery;

class WebinarsQuery extends ActiveQuery
{
    public function active(){
        return $this->andWhere(['in_webinars.status'=>Webinars::STATUS_ACTIVE]) ;
    }
    public function noActive(){
        return $this->andWhere(['in_webinars.status'=>Webinars::STATUS_NO_ACTIVE]) ;
    }
    public function passed(){
        return $this->andWhere(['in_webinars.status'=>Webinars::STATUS_PASSED]) ;
    }
    public function sortDesc(){
        return $this->orderBy(['id'=>SORT_DESC]);
    }
    public function comments(){
        return $this->joinWith('comments');
    }
    public function likes(){
        return $this->joinWith('likes');
    }
    public function participants(){
        return $this->joinWith('participants');
    }


}