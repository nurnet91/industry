<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Referals;

class SearchReferals extends Referals {

    public function rules() {

        return [
            [['id', 'status'], 'integer'],
            [['name_ru', 'name_en', 'name_ua', 'created_at'], 'safe'],
        ];

    }

    public function scenarios() {

        return Model::scenarios();

    }

    public function search($params) {

        $query = Referals::find();

        $dataProvider = new ActiveDataProvider(['query' => $query]);

        $this->load($params);

        if (!$this->validate()) {

            return $dataProvider;

        }

        $query->andFilterWhere(['id' => $this->id, 'status' => $this->status, 'created_at' => $this->created_at]);

        $query->andFilterWhere(['like', 'name_ru', $this->name_ru])
            ->andFilterWhere(['like', 'name_en', $this->name_en])
            ->andFilterWhere(['like', 'name_ua', $this->name_ua]);

        return $dataProvider;

    }
    
}
