<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SocialNetworks;

class SearchSocialNetworks extends SocialNetworks {

    public function rules() {

        return [
            [['id', 'status', 'norder'], 'integer'],
            [['name', 'url', 'created_at', 'updated_at'], 'safe'],
        ];

    }

    public function scenarios() {

        return Model::scenarios();

    }

    public function search($params) {

        $query = SocialNetworks::find();

        $dataProvider = new ActiveDataProvider(['query' => $query, 'sort' => ['defaultOrder' => ['norder'=>SORT_ASC]]]);

        $this->load($params);

        if (!$this->validate()) {

            return $dataProvider;

        }

        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'norder' => $this->norder,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'social_icon', $this->social_icon]);

        return $dataProvider;
    }
}
