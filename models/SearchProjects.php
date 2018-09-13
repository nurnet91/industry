<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Projects;

/**
 * SearchProjects represents the model behind the search form of `app\models\Projects`.
 */
class SearchProjects extends Projects
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['photo', 'title_ru', 'title_en', 'title_ua', 'link', 'duration_ru', 'duration_en', 'duration_ua', 'language_ru', 'language_en', 'language_ua', 'info_ru', 'info_en', 'info_ua', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Projects::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'title_ru', $this->title_ru])
            ->andFilterWhere(['like', 'title_en', $this->title_en])
            ->andFilterWhere(['like', 'title_ua', $this->title_ua])
            ->andFilterWhere(['like', 'link', $this->link])
            ->andFilterWhere(['like', 'duration_ru', $this->duration_ru])
            ->andFilterWhere(['like', 'duration_en', $this->duration_en])
            ->andFilterWhere(['like', 'duration_ua', $this->duration_ua])
            ->andFilterWhere(['like', 'language_ru', $this->language_ru])
            ->andFilterWhere(['like', 'language_en', $this->language_en])
            ->andFilterWhere(['like', 'language_ua', $this->language_ua])
            ->andFilterWhere(['like', 'info_ru', $this->info_ru])
            ->andFilterWhere(['like', 'info_en', $this->info_en])
            ->andFilterWhere(['like', 'info_ua', $this->info_ua]);

        return $dataProvider;
    }
}
