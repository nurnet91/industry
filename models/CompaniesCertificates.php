<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "in_companies_certificates".
 *
 * @property int $company_id
 * @property int $certificate_id
 *
 * @property CompanyProfileCertificates $certificate
 * @property CompanyInfo $company
 */
class CompaniesCertificates extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_companies_certificates';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['certificate_id'], 'integer'],
            [['certificate_id'], 'exist', 'skipOnError' => true, 'targetClass' => CompanyProfileCertificates::className(), 'targetAttribute' => ['certificate_id' => 'id']],
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
            'certificate_id' => 'Certificate ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCertificate()
    {
        return $this->hasOne(CompanyProfileCertificates::className(), ['id' => 'certificate_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(CompanyInfo::className(), ['user_id' => 'company_id']);
    }
}
