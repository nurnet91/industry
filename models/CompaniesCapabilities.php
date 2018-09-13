<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "in_company_capabilities".
 *
 * @property int $id
 * @property int $company_id
 * @property int $capability_id
 */
class CompaniesCapabilities extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_companies_capabilities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_id', 'capability_id'], 'required'],
            [['company_id', 'capability_id'], 'integer'],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => CompanyInfo::className(), 'targetAttribute' => ['company_id' => 'user_id']],
            [['capability_id'], 'exist', 'skipOnError' => true, 'targetClass' => CompanyProfileCapabilities::className(), 'targetAttribute' => ['capability_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_id' => 'Company ID',
            'capability_id' => 'Capability ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(CompanyInfo::className(), ['id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(CompanyProfileCapabilities::className(), ['id' => 'capability_id']);
    }
}
