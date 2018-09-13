<?php

namespace app\models;

use Yii;
use app\components\NFormat;
use app\models\Words;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class SearchWords extends Words {

    public function rules() {

        return [
            [['id', 'status'], 'integer'],
            [['title_ru', 'title_en', 'title_ua', 'text_ru', 'text_en', 'text_ua', 'created_at', 'updated_at'], 'safe'],
        ];

    }

    public function scenarios() {

        return Model::scenarios();

    }

    public function search($params) {

        $query = Words::find();

        $dataProvider = new ActiveDataProvider(['query' => $query]);

        $this->load($params);

        if (!$this->validate()) {

            return $dataProvider;

        }

        $query->andFilterWhere(['id' => $this->id, 'status' => $this->status]);

        $query->andFilterWhere(['like', 'title_ru', $this->title_ru])
            ->andFilterWhere(['like', 'title_en', $this->title_ru])
            ->andFilterWhere(['like', 'title_ua', $this->title_ru])
            ->andFilterWhere(['like', 'text_ru', $this->text_ru])
            ->andFilterWhere(['like', 'text_en', $this->text_ru])
            ->andFilterWhere(['like', 'text_ua', $this->text_ru])
            ->andFilterWhere(['like', 'created_at', NFormat::dt($this->created_at)]);

        return $dataProvider;

    }
    
}
