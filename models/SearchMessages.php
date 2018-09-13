<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Messages;

class SearchMessages extends Messages {

    public function rules() {

        return [
            [['id', 'status', /*'type'*/], 'integer'],
            [['user_id'], 'string'],
            [['title', 'text', 'created_at', 'updated_at'], 'safe'],
        ];

    }

    public function scenarios() {

        return Model::scenarios();

    }

    public function search($params) {

        $query = Messages::find()->innerJoinWith('user', true);

        $dataProvider = new ActiveDataProvider(['query' => $query]);

        $this->load($params);

        if (!$this->validate()) {

            return $dataProvider;

        }

        $query->andFilterWhere([
            'in_messages.id' => $this->id,
            // 'type' => $this->type,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'in_messages.status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'in_messages.title', $this->title])
            ->andFilterWhere(['like', 'in_messages.text', $this->text])
            ->andFilterWhere(['like', 'in_users.email', $this->user_id]);

        return $dataProvider;

    }

}
