<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "in_companies_employees".
 *
 * @property int $company_id
 * @property int $employee_id
 *
 * @property CompanyInfo $company
 * @property CompanyProfileEmployees $company0
 */
class CompaniesEmployees extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_companies_employees';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['employee_id'], 'integer'],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => CompanyInfo::className(), 'targetAttribute' => ['company_id' => 'user_id']],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => CompanyProfileEmployees::className(), 'targetAttribute' => ['employee_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'company_id' => 'Company ID',
            'employee_id' => 'Employee ID',
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
        return $this->hasOne(CompanyProfileEmployees::className(), ['id' => 'employee_id']);
    }
}
