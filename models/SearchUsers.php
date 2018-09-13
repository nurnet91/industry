<?php

namespace app\models;

use Yii;
use app\components\NFormat;
use app\models\Users;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class SearchUsers extends Users {

    public $country;
    public $region;
    
    public function rules() {

        return [
            [['id', 'status', 'role_id', 'social_id'], 'integer'],
            [['country', 'region'], 'string'],
            [['username', 'email', 'password_hash', 'auth_key', 'password_reset_token', 'created_at', 'updated_at', 'last_visit'], 'safe'],
        ];

    }

    public function scenarios() {

        return Model::scenarios();

    }

    public function search($params) {

        $query = Users::find()
            ->joinWith('info', true)
            ->joinWith('companyinfo', true)
            ->joinWith('country', true)
            ->joinWith('region', true);

        $dataProvider = new ActiveDataProvider(['query' => $query]);

        $dataProvider->pagination->pageSize=50;

        $this->load($params);

        if (!$this->validate()) {

            return $dataProvider;

        }

        $query->andFilterWhere([
            'in_users.id' => $this->id,
            'in_users.status' => $this->status,
            'in_users.role_id' => $this->role_id,
            'in_users.social_id' => $this->social_id,
        ]);

        $query->andFilterWhere(['like', 'in_users.username', $this->username])
            ->andFilterWhere(['like', 'in_users.email', $this->email])
            ->andFilterWhere(['like', 'in_users.password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'in_users.auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'in_users.password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'in_a_countries.name_ru', $this->country])
            ->andFilterWhere(['like', 'in_users.created_at',  NFormat::dt($this->created_at)])
            ->andFilterWhere(['like', 'in_users.updated_at',  NFormat::dt($this->updated_at)])
            ->andFilterWhere(['like', 'in_users.last_visit',  NFormat::dt($this->last_visit)])
            ->andFilterWhere(['like', 'in_a_regions.name_ru', $this->region]);

        return $dataProvider;

    }

}
