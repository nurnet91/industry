<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "in_companies_clients".
 *
 * @property int $company_id
 * @property int $client_id
 *
 * @property CompanyProfileClients $client
 * @property CompanyInfo $company
 */
class CompaniesClients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_companies_clients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_id'], 'integer'],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => CompanyProfileClients::className(), 'targetAttribute' => ['client_id' => 'id']],
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
            'client_id' => 'Client ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClients(){

        return $this->hasOne(CompanyProfileClients::className(),['id'=>'client_id']);
    }
    public function getCompany(){

        return $this->hasOne(CompanyInfo::className(),['user_id'=>'company_id']);
    }
}
