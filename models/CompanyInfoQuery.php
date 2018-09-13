<?php

namespace app\models;


use yii\db\ActiveQuery;

class CompanyInfoQuery extends ActiveQuery
{
    public function advertisement(){
        return $this->joinWith(['advertisement'=>function($e){
            return $e->andWhere(['status'=>1])->orderBy(['id'=>SORT_DESC]);
        }]);
    }
    public function user(){
        return $this->andWhere(['in_company_info.user_id'=>\Yii::$app->user->id]);
    }
    public function about(){
        return $this->joinWith('about');
    }
    public function requests(){
        return $this->joinWith('requests');
    }
    public function favorites(){
        return $this->joinWith('favorites');
    }
    public function employees(){
        return $this->joinWith(['employees']);
    }
    public function capabilities(){
        return $this->joinWith(['capabilities']);
    }
    public function contacts(){
        return $this->joinWith(['contacts']);
    }
    public function chooses(){
        return $this->joinWith(['chooses']);
    }
    public function certificates(){
        return $this->joinWith(['certificates']);
    }
    public function clients(){
        return $this->joinWith(['clients']);
    }
    public function activeWebinars(){
        return $this->joinWith(['activeWebinars']);
    }
    public function allWebinars(){
        return $this->joinWith(['webinars']);
    }
    public function passedWebinars(){
        return $this->joinWith(['passedWebinars'=>function($e){
            return $e->comments()->likes()->participants();
        }]);
    }
    public function newsSale(){
        return $this->joinWith('newsSale');
    }
    public function newsCompany(){
        return $this->joinWith('newsCompany');
    }
    public function ads(){
        return $this->joinWith('ads');
    }
    public function testimonials(){
        return $this->joinWith('testimonials');
    }
    public function popular(){
        return $this->joinWith('comments',function($e){
            return $e->orderBy(['COUNT(in_comments.rating)'=>SORT_DESC]);
        });
    }
    public function self($id){
        return $this->andWhere([CompanyInfo::tableName().'.id'=>$id]);
    }


}