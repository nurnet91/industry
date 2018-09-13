<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\web\User;

class UsersQuery extends ActiveQuery {

    public function company(){

        return $this->andWhere(['in_users.role_id' => Users::ROLE_COMPANY]);

    }

    public function self(){

        return $this->andWhere(['in_users.id' => \Yii::$app->user->id]);

    }

    public function doverenniy($off, $lim) {

    	return $this->joinWith('companyinfo')
    		->andWhere(['in_users.doverenniy' => 1])
    		->offset($off)
    		->limit($lim);
    	
    }
    public function joinCompany(){
        return $this->joinWith(['companyinfo'=>function($model){
            return $model->about()->certificates()->employees()->chooses()->clients()->capabilities()->contacts();
        }]);
    }
    public function webinars(){
        return $this->joinWith(['companyinfo'=>function($model){
            return $model->passedWebinars()->activeWebinars();
        }]);
    }
    public function country(){
        return $this->joinWith(['country']);
    }
    public function region(){
        return $this->joinWith(['region']);
    }
    public function ads(){
        return $this->joinWith(['ads'=>function($model){
            return $model->limit(5);
        }]);
    }
    public function publications(){
        return $this->joinWith(['publications'=>function($model){
            return $model->sortId()->comments()->limit(5)->likes();
        }]);
    }
    public function news(){
        return $this->joinWith(['news'=>function($model){
            return $model->types();
        }]);
    }
    public function newsSale(){
        return $this->joinWith(['newsSale']);
    }
    public function newsCompany(){
        return $this->joinWith(['newsCompany']);
    }
    public function companyInfo(){
        return $this->joinWith('companyinfo');
    }
    public function userInfo(){
        return $this->joinWith('info');
    }
    public function companyPopular(){
        return $this->joinWith('companyinfo');
    }
    public function seen(){
        return $this->joinWith('seen',function($e){
            return $e->orderBy(['in_seen_company.created_at'=>SORT_DESC])->limit(4);
        });
    }
    public function city(){
        return $this->joinWith('city');
    }

    public function companyAbout()
    {
        return $this->joinWith('companyinfo', function ($e) {
            return $e->about();
        });
    }
    public function about(){
        return $this->joinWith('about');
    }

}