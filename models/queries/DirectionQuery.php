<?php

namespace app\models\queries;


use app\models\Directions;
use yii\db\ActiveQuery;
use yii\db\Query;

class DirectionQuery extends ActiveQuery
{
    public function newsIndustry()
    {
        return $this->joinWith(['newsArticleByDate'])
            ->joinWith(['newsAnalyticByDate'])
            ->joinWith(['newsSaleByDate'])
            ->joinWith(['newsReportsByDate'])
            ->joinWith(['newsVideosByDate'])
            ->joinWith(['newsPresentationsByDate'])
            ->joinWith(['newsPhotoByDate'])
            ->joinWith(['newsMainByDate']);
    }
    public function active(){
        return $this->andWhere(['in_filter_directions.status'=>1]);
    }
    public function newsAndEvents(){
       return $this->joinWith(
            [
                'newsCompanyru',
                'newsCompanyen',
                'newsEvents',
                'newsSale',
                'newsReports',
                'newsMain',
                'newsBd'
            ]);
    }
    public function events(){
        return $this->joinWith(   [
            'newsConference',
            'newsRF',
            'newsEnRF',
            'newsEvents',
        ]);

    }

    public function popular(){
        return $this->with(['newsPopular'=>function($e){
            return $e->likes();
        }]);
    }
    public function discussed(){
        return $this->with(['newsDiscussed'=>function($e){
            return $e->comments();
        }]);

    }
    public function self($id){
        return $this->andWhere([Directions::tableName().'.id'=>$id]);
    }
    public function newsRussian(){
        return $this->joinWith(['newsCompanyru'=>function($e){
            return $e->company();
        }]);
    }
    public function newsEvents(){
        return $this->joinWith('newsEvents');
    }

}