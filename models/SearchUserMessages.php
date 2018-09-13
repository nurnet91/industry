<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UserMessages;

class SearchUserMessages extends UserMessages {

    public function rules() {
        return [
            [['id'], 'integer'],
            [['user_id', 'message_id'], 'string'],
            [['created_at'], 'safe'],
        ];
    }

    public function scenarios() {

        return Model::scenarios();
    }

    public function search($params) {

        $query = UserMessages::find()->innerJoinWith('user', true)->innerJoinWith('message', true);

        $dataProvider = new ActiveDataProvider(['query' => $query]);

        $this->load($params);

        if (!$this->validate()) {

            return $dataProvider;

        }

        $query->andFilterWhere([
            'id' => $this->id, 
            'created_at' => $this->created_at
        ]);
        $query->andFilterWhere(['like', 'in_users.email', $this->user_id])
            ->andFilterWhere(['like', 'in_messages.title', $this->message_id]);

        return $dataProvider;
    }
}
