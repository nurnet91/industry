<?php

namespace app\models;

use Yii;
use app\components\NFormat;
use app\models\About;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class SearchAbout extends About {
    
    public function rules() {

        return [
            [['id', 'status', 'norder'], 'integer'],
            [['photo', 'text_ru', 'text_en', 'text_ua', 'link', 'author_ru', 'author_en', 'author_ua', 'dolz_ru', 'dolz_en', 'dolz_ua', 'created_at', 'updated_at'], 'safe'],
        ];

    }

    public function scenarios() {

        return Model::scenarios();

    }

    public function search($params) {

        $query = About::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['norder'=>SORT_ASC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
        
            return $dataProvider;

        }

        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'norder' => $this->norder,
        ]);

        $query->andFilterWhere(['like', 'photo',    $this->photo])
            ->andFilterWhere(['like', 'text_ru',    $this->text_ru])
            ->andFilterWhere(['like', 'text_en',    $this->text_ru])
            ->andFilterWhere(['like', 'text_ua',    $this->text_ru])
            ->andFilterWhere(['like', 'link',       $this->link])
            ->andFilterWhere(['like', 'author_ru',  $this->author_ru])
            ->andFilterWhere(['like', 'author_en',  $this->author_ru])
            ->andFilterWhere(['like', 'author_ua',  $this->author_ru])
            ->andFilterWhere(['like', 'dolz_ru',    $this->dolz_ru])
            ->andFilterWhere(['like', 'dolz_en',    $this->dolz_ru])
            ->andFilterWhere(['like', 'dolz_ua',    $this->dolz_ru])
            ->andFilterWhere(['like', 'created_at', NFormat::dt($this->created_at)]);

        return $dataProvider;
    }
}
