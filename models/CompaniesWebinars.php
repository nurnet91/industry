<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "in_companies_webinars".
 *
 * @property int $company_id
 * @property int $webinar_id
 *
 * @property InCompanyInfo $company
 * @property InWebinars $webinar
 */
class CompaniesWebinars extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_companies_webinars';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_id', 'webinar_id'], 'integer'],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => CompanyInfo::className(), 'targetAttribute' => ['company_id' => 'id']],
            [['webinar_id'], 'exist', 'skipOnError' => true, 'targetClass' => Webinars::className(), 'targetAttribute' => ['webinar_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'company_id' => 'Company ID',
            'webinar_id' => 'Webinar ID',
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
    public function getWebinar()
    {
        return $this->hasOne(Webinars::className(), ['id' => 'webinar_id']);
    }
}
