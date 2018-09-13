<?php

namespace app\widgets;


use app\models\News;
use app\models\NewsComments;
use yii\base\Widget;
use yii\helpers\ArrayHelper;

class MostDiscussedNewsWidget extends Widget
{
    public $item;
    public $direction = null;
    public function run()
    {
        //TODO НАДО ПОПРАВИТ РЕЙТИНГ
        $query = (new \yii\db\Query())
            ->select([
                'new_id',
                'COUNT(comment_id) AS topcount'
            ])
            ->from(NewsComments::tableName())
            ->groupBy(['new_id'])
            ->orderBy(['topcount' => SORT_DESC]);
        $rows = $query->all();
        $news = ArrayHelper::getColumn($rows , 'new_id');
        $model = News::find()->andWhere(['in','id',$news])->direction($this->direction)->limit(5)->all();
        return $this->render('most-discussed-news',['model'=>$model,'item'=>$this->item]);
    }

}