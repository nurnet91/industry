<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Regions;

class SearchRegions extends Regions {

    public function rules() {

        return [
            [['id', 'status'], 'integer'],
            [['name_ru', 'name_en', 'name_ua'], 'safe'],
        ];

    }

    public function scenarios() {

        return Model::scenarios();

    }

    public function search($params, $country_id) {

        $query = Regions::find()->where(['country_id' => $country_id]);

        $dataProvider = new ActiveDataProvider(['query' => $query]);

        $this->load($params);

        if (!$this->validate()) {

            return $dataProvider;

        }

        $query->andFilterWhere(['id' => $this->id, 'status' => $this->status]);

        $query->andFilterWhere(['like', 'name_ru', $this->name_ru]);

        return $dataProvider;

    }
    
}
