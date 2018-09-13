<?php

namespace app\models;

use app\components\NFormat;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PlacementRequests;

/**
 * PlacementRequestsFiltr represents the model behind the search form of `app\models\PlacementRequests`.
 */
class PlacementRequestsFiltr extends Users
{
    public $direction;
    public $theme;
    public $inn;
    public $filt = [];
    public $limit = 10;
    public $country;
    public $region;
    public $city;
    public function rules() {

        return [
            [['id','status','limit'], 'integer'],
            [['country', 'region','city'], 'integer'],
            [['filr'],'safe'],
        ];

    }

    public function scenarios() {

        return Model::scenarios();

    }


    public function search($params) {

        $query = Users::find()->company()->region()->country()->city()->companyInfo()->about()->orderBy(['in_company_info.company_variant_id'=>SORT_DESC]);

        $dataProvider = new ActiveDataProvider(['query' => $query]);

        $this->load($params);

        if( isset($params) )
        {
            $this->attributes = $params;
        }


        $dataProvider->pagination->pageSize=$this->limit;


        if (!$this->validate()) {

            return $dataProvider;

        }

       $query ->andFilterWhere(['=', 'in_a_countries.id', $this->country])
              ->andFilterWhere(['=', 'in_a_regions.id', $this->region])
              ->andFilterWhere(['=', 'in_a_cities.id', $this->city]);


        return $dataProvider;

    }
}
