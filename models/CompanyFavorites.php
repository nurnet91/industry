<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "in_company_favorites".
 *
 * @property int $company_id
 * @property int $user_id
 */
class CompanyFavorites extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_company_favorites';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_id', 'user_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'company_id' => 'Company ID',
            'user_id' => 'User ID',
        ];
    }
}
