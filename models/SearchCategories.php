<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Categories;

class SearchCategories extends Categories {

    public function rules() {

        return [
            [['id', 'parent_id', 'status'], 'integer'],
            [['name_ru', 'created_at', 'updated_at'], 'safe'],
        ];

    }

    public function scenarios() {

        return Model::scenarios();

    }

    public function search($params) {

        $query = Categories::find();

        $dataProvider = new ActiveDataProvider(['query' => $query]);

        $this->load($params);

        if (!$this->validate()) {

            return $dataProvider;

        }

        $query->andFilterWhere([
            'id' => $this->id,
            'parent_id' => $this->parent_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name_ru', $this->name_ru]);

        return $dataProvider;

    }
    
}
