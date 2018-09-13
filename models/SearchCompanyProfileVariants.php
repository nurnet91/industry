<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CompanyProfileVariants;

/**
 * SearchCompanyProfileVariants represents the model behind the search form of `app\models\CompanyProfileVariants`.
 */
class SearchCompanyProfileVariants extends CompanyProfileVariants
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'industries_count', 'services_count', 'photos_count', 'videos_count', 'photo_video_size', 'show_priority', 'on_reviews', 'special_share', 'extra_sections_ch_n', 'extra_sections_sh_r_c', 'tenders_notification', 'statistics', 'update_info', 'vacancy_deploy', 'equipment_deploy', 'on_tenders', 'price', 'promo_price', 'status'], 'integer'],
            [['name', 'created_at', 'updated_at'], 'safe'],
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
        $query = CompanyProfileVariants::find();

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
            'industries_count' => $this->industries_count,
            'services_count' => $this->services_count,
            'photos_count' => $this->photos_count,
            'videos_count' => $this->videos_count,
            'photo_video_size' => $this->photo_video_size,
            'show_priority' => $this->show_priority,
            'on_reviews' => $this->on_reviews,
            'special_share' => $this->special_share,
            'extra_sections_ch_n' => $this->extra_sections_ch_n,
            'extra_sections_sh_r_c' => $this->extra_sections_sh_r_c,
            'tenders_notification' => $this->tenders_notification,
            'statistics' => $this->statistics,
            'update_info' => $this->update_info,
            'vacancy_deploy' => $this->vacancy_deploy,
            'equipment_deploy' => $this->equipment_deploy,
            'on_tenders' => $this->on_tenders,
            'price' => $this->price,
            'promo_price' => $this->promo_price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
