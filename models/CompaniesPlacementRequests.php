<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "in_companies_placement_requests".
 *
 * @property int $user_id
 * @property int $placement_id
 */
class CompaniesPlacementRequests extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_companies_placement_requests';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'placement_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'placement_id' => 'Placement ID',
        ];
    }
}
