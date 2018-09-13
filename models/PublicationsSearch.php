<?php

namespace app\models;


use yii\base\Model;
use yii\data\ActiveDataProvider;

class PublicationsSearch extends Publications
{
    /**
     * {@inheritdoc}
     */
    public $type_id;
    public $views;
    public $title;
    public $created;
    public $date;
    public $type;
    public $ads;
    public $status;
    public function rules()
    {
        return [
            [['type_id', 'views','status','type'], 'integer'],
            [['title', 'created','date','ads'], 'safe'],
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
     * @return ActiveDataProvider Открой контроллер и вид.
     */

    public function search($params,$sort = null)
    {
        $query = Publications::find()->sortId()->likes()->comments();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
//            'sort'=>[
//                'attributes' => [
//                    'date' => [
//                        'asc' => ['in_publications.created_at' => SORT_ASC],
//                        'desc' => ['in_publications.created_at' => SORT_DESC],
//                        'default' => SORT_DESC
//                    ],
//                    'views' => [
//                        'asc' => ['in_publications.views' => SORT_ASC],
//                    ],
//                    'title' => [
//                        'asc' => ['in_publications.title' => SORT_ASC],
//                        'desc' => ['in_publications.title' => SORT_DESC],
//                        'default' => SORT_ASC
//                    ],
//                    'type' => [
//                        'asc' => ['in_publications.type_id' => SORT_ASC],
//                    ],
//                ],
//            ],
        ]);
        $this->load($params);

        if( isset($params) )
        {
            $this->attributes = $params;
        }

        if (!$this->validate())
        {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'in_publications.title', $this->title]);

        return $dataProvider;
    }


}