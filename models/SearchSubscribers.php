<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Subscribers;

/**
 * SearchSubscribers represents the model behind the search form of `app\models\Subscribers`.
 */
class SearchSubscribers extends Subscribers
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'phone', 'info_inform', 'info_special', 'info_offer'], 'integer'],
            [['name', 'email', 'created_at', 'updated_at', 'category_ids'], 'safe'],
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
        $query = Subscribers::find();

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
            'phone' => $this->phone,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'info_inform' => $this->info_inform,
            'info_special' => $this->info_special,
            'info_offer' => $this->info_offer,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'category_ids', $this->category_ids]);

        return $dataProvider;
    }
}
