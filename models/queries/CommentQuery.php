<?php

namespace app\models\queries;


use app\models\Comments;
use yii\db\ActiveQuery;

class CommentQuery extends ActiveQuery
{
    public function active(){
        return $this->andWhere(['in_comments'=>Comments::STATUS_ACTIVE]);
    }
    public function user(){
        return $this->joinWith(['user'=>function($e){
           return $e->userInfo()->companyInfo();
        }]);
    }
    public function likes(){
        return $this->joinWith('likes');
    }
    public function children(){
        return $this->joinWith('children');
    }
    public function parents(){
        return $this->andWhere(['in_comments.parent_id'=>0]);
    }

}