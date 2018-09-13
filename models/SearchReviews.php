<?php

namespace app\models;

use Yii;
use app\components\NFormat;
use app\models\Reviews;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class SearchReviews extends Reviews {

    public function rules() {

        return [
            [['id', 'status'], 'integer'],
            [['author_ru', 'author_en', 'author_ua', 'review_text_ru', 'review_text_en', 'review_text_ua', 'author_desc_ru', 'author_desc_en', 'author_desc_ua', 'created_at', 'updated_at'], 'safe'],
        ];

    }

    public function scenarios() {

        return Model::scenarios();

    }

    public function search($params) {

        $query = Reviews::find();

        $dataProvider = new ActiveDataProvider(['query' => $query]);

        $this->load($params);

        if (!$this->validate()) {

            return $dataProvider;

        }

        $query->andFilterWhere(['id' => $this->id, 'status' => $this->status]);

        $query->andFilterWhere(['like', 'author_ru', $this->author_ru])
            ->andFilterWhere(['like', 'author_en', $this->author_ru])
            ->andFilterWhere(['like', 'author_ua', $this->author_ru])
            ->andFilterWhere(['like', 'author_desc_ru', $this->author_desc_ru])
            ->andFilterWhere(['like', 'author_desc_en', $this->author_desc_ru])
            ->andFilterWhere(['like', 'author_desc_ua', $this->author_desc_ru])
            ->andFilterWhere(['like', 'review_text_ru', $this->review_text_ru])
            ->andFilterWhere(['like', 'review_text_en', $this->review_text_ru])
            ->andFilterWhere(['like', 'review_text_ua', $this->review_text_ru])
            ->andFilterWhere(['like', 'created_at', NFormat::dt($this->created_at)]);

        return $dataProvider;

    }
    
}
