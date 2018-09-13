<?php

namespace app\widgets;


use app\models\Comments;
use app\models\CompaniesComments;
use app\models\CompanyInfo;
use app\models\Users;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\web\User;

class TopCompanyWidget extends Widget
{
    public function run()
    {
        //TODO НАДО ПОПРАВИТ РЕЙТИНГ
        $query = (new \yii\db\Query())
            ->select([
                'user_id',
                'COUNT(comment_id) AS topcount'
            ])
            ->from(CompaniesComments::tableName())
            ->groupBy(['user_id'])
            ->orderBy(['topcount' => SORT_DESC])
            ->limit(20);
        $rows = $query->all();
        $company_id= ArrayHelper::getColumn($rows , 'user_id');
        $company = CompanyInfo::find()->andWhere(['in','user_id',$company_id])->all();
        return $this->render('top-company',['model'=>$company]);
    }

}