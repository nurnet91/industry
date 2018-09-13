<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "in_companies_contacts".
 *
 * @property int $company_id
 * @property int $contact_id
 */
class CompaniesEmplContacts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_companies_contacts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_id', 'contact_id'], 'required'],
            [['company_id', 'contact_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'company_id' => 'Company ID',
            'contact_id' => 'Contact ID',
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
        return $this->hasOne(CompanyProfileEmplContacts::className(), ['id' => 'contact_id']);
    }
}
