<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FilterMain;

/**
 * SearchFilterMainEquipment represents the model behind the search form of `app\models\FilterMain`.
 */
class SearchFilterMainEquipment extends FilterMain
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['direction_id', 'theme_id', 'theme_attr_parent_id',  'theme_attr_id', 'sub_theme_id', 'tech_id', 'operation_id', 'equipment_type_id', 'equipment_manufacturer_id', 'attributes_id', 'type', 'status', 'theme_attribute', 'show_anywhere'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
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
        $query = FilterMain::find()->joinWith(['direction', 'theme', 'themeAttr', 'themeAttrParent', 'subTheme', 'technology', 'operation', 'eType', 'eManufacturer', 'operationAttribute'])->where(['type' => 2]);

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
            'direction_id' => $this->direction_id,
            'theme_id' => $this->theme_id,
            'theme_attr_parent_id' => $this->theme_attr_parent_id,
            'theme_attr_id' => $this->theme_attr_id,
            'theme_attribute' => $this->theme_attribute,
            'sub_theme_id' => $this->sub_theme_id,
            'tech_id' => $this->tech_id,
            'operation_id' => $this->operation_id,
            'equipment_type_id' => $this->equipment_type_id,
            'equipment_manufacturer_id' => $this->equipment_manufacturer_id,
            'attributes_id' => $this->attributes_id,
            'in_filter_main.type' => $this->type,
            'status' => $this->status,
            'show_anywhere' => $this->show_anywhere,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        return $dataProvider;
    }
}
