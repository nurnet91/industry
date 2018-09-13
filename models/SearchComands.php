<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Comands;

/**
 * SearchComands represents the model behind the search form of `app\models\Comands`.
 */
class SearchComands extends Comands
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['photo', 'fio_ru', 'fio_en', 'fio_ua', 'occupation_ru', 'occupation_en', 'occupation_ua', 'education_ru', 'education_en', 'education_ua', 'regalia_ru', 'regalia_en', 'regalia_ua', 'experience_ru', 'experience_en', 'experience_ua', 'info_ru', 'info_en', 'info_ua', 'created_at', 'updated_at'], 'safe'],
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
        $query = Comands::find();

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
            ->andFilterWhere(['like', 'fio_ru', $this->fio_ru])
            ->andFilterWhere(['like', 'fio_en', $this->fio_en])
            ->andFilterWhere(['like', 'fio_ua', $this->fio_ua])
            ->andFilterWhere(['like', 'occupation_ru', $this->occupation_ru])
            ->andFilterWhere(['like', 'occupation_en', $this->occupation_en])
            ->andFilterWhere(['like', 'occupation_ua', $this->occupation_ua])
            ->andFilterWhere(['like', 'education_ru', $this->education_ru])
            ->andFilterWhere(['like', 'education_en', $this->education_en])
            ->andFilterWhere(['like', 'education_ua', $this->education_ua])
            ->andFilterWhere(['like', 'regalia_ru', $this->regalia_ru])
            ->andFilterWhere(['like', 'regalia_en', $this->regalia_en])
            ->andFilterWhere(['like', 'regalia_ua', $this->regalia_ua])
            ->andFilterWhere(['like', 'experience_ru', $this->experience_ru])
            ->andFilterWhere(['like', 'experience_en', $this->experience_en])
            ->andFilterWhere(['like', 'experience_ua', $this->experience_ua])
            ->andFilterWhere(['like', 'info_ru', $this->info_ru])
            ->andFilterWhere(['like', 'info_en', $this->info_en])
            ->andFilterWhere(['like', 'info_ua', $this->info_ua]);

        return $dataProvider;
    }
}
