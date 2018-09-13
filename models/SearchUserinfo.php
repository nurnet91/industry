<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Userinfo;

/**
 * SearchUserinfo represents the model behind the search form of `app\models\Userinfo`.
 */
class SearchUserinfo extends Userinfo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'referal_id', 'info_inform', 'info_special', 'info_offer', 'sex', 'repost'], 'integer'],
            [['first_name', 'last_name', 'middle_name', 'b_date', 'company', 'position', 'created_at', 'updated_at', 'phone', 'skype', 'site_company', 'photo'], 'safe'],
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
        $query = Userinfo::find();

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
            'user_id' => $this->user_id,
            'b_date' => $this->b_date,
            'referal_id' => $this->referal_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'info_inform' => $this->info_inform,
            'info_special' => $this->info_special,
            'info_offer' => $this->info_offer,
            'sex' => $this->sex,
            'repost' => $this->repost,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'middle_name', $this->middle_name])
            ->andFilterWhere(['like', 'company', $this->company])
            ->andFilterWhere(['like', 'position', $this->position])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'skype', $this->skype])
            ->andFilterWhere(['like', 'site_company', $this->site_company])
            ->andFilterWhere(['like', 'photo', $this->photo]);

        return $dataProvider;
    }
}
