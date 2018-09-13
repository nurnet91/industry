<?php

namespace app\models\queries;


use app\models\Publications;
use Yii;
use yii\db\ActiveQuery;

class PublicationsQuery extends ActiveQuery
{
    public function user(){
        return $this->andWhere(['in_publications.user_id'=>Yii::$app->user->id]);

    }
    public function userJoins(){
        return $this->joinWith(['user'=>function($model){
            return $model->ads();
        }]);
    }
    public function active(){
        return $this->andWhere(['=','in_publications.status',Publications::STATUS_ACTIVE]);
    }
    public function comments(){
        return $this->joinWith('comments');
    }
    public function likes(){
        return $this->joinWith('likes');
    }
    public function sortId(){
        return $this->orderBy(['in_publications.id'=>SORT_DESC]);
    }
    public function direction($direction){
        return $this->andWhere(['direction_id'=>$direction]);
    }

}