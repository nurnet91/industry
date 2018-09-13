<?php

namespace app\models\queries;


use app\models\Categories;
use yii\db\ActiveQuery;

class CategoryQuery extends ActiveQuery
{
    public function news(){
        return $this
            ->joinWith(['newsCompanyru','newsCompanyen','newsEvents','newsArticle','newsAnalytic','newsSale','newsReports','newsVideos','newsPresentations','newsPhoto']);
//            ->joinWith('newsCompanyen')
//            ->joinWith('newsEvents')
//            ->joinWith('newsArticle')
//            ->joinWith('newsAnalytic')
//            ->joinWith('newsSale')
//            ->joinWith('newsReports')
//            ->joinWith('newsVideos')
//            ->joinWith('newsPresentations')
//            ->joinWith('newsPhoto');
    }
    public function active(){
        return $this->andWhere(['in_categories.status'=>1]);
    }


}