<?php

namespace app\models\queries;


use app\models\News;
use yii\db\ActiveQuery;

class NewsQuery extends ActiveQuery
{
    public function types(){
        return $this->joinWith('types');
    }
    public function active(){
        return $this->andWhere(['in_news.status'=>News::STATUS_ACTIVE]);
    }
    public function likes(){
        return $this->joinWith('likes');
    }
    public function comments(){
        return $this->joinWith('comments');
    }
    public function company(){
        return $this->joinWith('company');
    }
    public function sortDesc(){
        return $this->orderBy(['in_news.id'=>SORT_DESC]);
    }
    public function direction($direction){
        return $this->andWhere(['in_news.category_id'=>$direction]);
    }
    public function companyRu(){
        return $this->andWhere(['in_news.type_id'=>News::COMPANY_NEWS_RU]);
    }
    public function events(){
        return $this->andWhere(['in_news.type_id'=>News::NEWS_EVENTS]);

    }
    public function joinDirection(){
        return $this->joinWith('direction');
    }
    public function self($id){
        return $this->andWhere(['in_news.id'=>$id]);
    }
    public function type($type){
        return $this->andWhere(['in_news.type_id'=>$type]);
    }
    public function user(){
        return $this->joinWith('user');
    }

}