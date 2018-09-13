<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Contacts;

class SearchContacts extends Contacts {
    
    public function rules() {

        return [
            [['id', 'status'], 'integer'],
            [['company_name', 'adres', 'lat', 'lon', 'phones', 'emailes'], 'safe'],
        ];

    }

    public function scenarios() {

        return Model::scenarios();

    }

    public function search($params) {

        $query = Contacts::find();

        $dataProvider = new ActiveDataProvider(['query' => $query]);

        $this->load($params);

        if (!$this->validate()) {
            
            return $dataProvider;

        }
        
        $query->andFilterWhere(['id' => $this->id, 'status' => $this->status]);

        $query->andFilterWhere(['like', 'company_name', $this->company_name])
            ->andFilterWhere(['like', 'adres', $this->adres])
            ->andFilterWhere(['like', 'lat', $this->lat])
            ->andFilterWhere(['like', 'lon', $this->lon])
            ->andFilterWhere(['like', 'phones', $this->phones])
            ->andFilterWhere(['like', 'emailes', $this->emailes]);

        return $dataProvider;

    }
    
}
