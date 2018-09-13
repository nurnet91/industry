<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Countries;

class SearchCountries extends Countries {

    public function rules() {

        return [
            [['id', 'status'], 'integer'],
            [['name_ru', 'name_en', 'name_ua'], 'safe'],
        ];

    }

    public function scenarios() {

        return Model::scenarios();

    }

    public function search($params) {

        $query = Countries::find();

        $dataProvider = new ActiveDataProvider(['query' => $query]);

        $this->load($params);

        if (!$this->validate()) {

            return $dataProvider;

        }

        $query->andFilterWhere(['id' => $this->id, 'status' => $this->status]);

        $query->andFilterWhere(['like', 'name_ru', $this->name_ru])
            ->andFilterWhere(['like', 'name_en', $this->name_en])
            ->andFilterWhere(['like', 'name_ua', $this->name_ua]);

        return $dataProvider;

    }
    
}
