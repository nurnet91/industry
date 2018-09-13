<?php

namespace app\widgets;


use app\models\News;
use app\models\NewsLikes;
use yii\base\Widget;
use yii\helpers\ArrayHelper;

class PopularNewsWidget extends Widget
{
    public $item;
    public $direction;
    public function run()
    {
        //TODO НАДО ПОПРАВИТ РЕЙТИНГ
        $query = (new \yii\db\Query())
            ->select([
                'new_id',
                'COUNT(user_id) AS topcount'
            ])
            ->from(NewsLikes::tableName())
            ->groupBy(['new_id'])
            ->orderBy(['topcount' => SORT_DESC]);
        $rows = $query->all();
        $ids= ArrayHelper::getColumn($rows , 'new_id');
        $popular = News::find()->andWhere(['in','in_news.id',$ids])->direction($this->direction)->limit(5)->all();
        return $this->render('popular-news',['model'=>$popular,'item'=>$this->item]);
    }

}