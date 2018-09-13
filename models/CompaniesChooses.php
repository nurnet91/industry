<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "in_companies_chooses".
 *
 * @property int $company_id
 * @property int $choose_id
 *
 * @property CompanyProfileChooses $choose
 * @property CompanyInfo $company
 */
class CompaniesChooses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_companies_chooses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['choose_id'], 'integer'],
            [['choose_id'], 'exist', 'skipOnError' => true, 'targetClass' => CompanyProfileChooses::className(), 'targetAttribute' => ['choose_id' => 'id']],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => CompanyInfo::className(), 'targetAttribute' => ['company_id' => 'user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'company_id' => 'Company ID',
            'choose_id' => 'Choose ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChoose()
    {
        return $this->hasOne(CompanyProfileChooses::className(), ['id' => 'choose_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(CompanyInfo::className(), ['user_id' => 'company_id']);
    }
}
