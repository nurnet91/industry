<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "in_contacts".
 *
 * @property int $id
 * @property string $address_one
 * @property string $address_two
 * @property int $public_phone
 * @property string $public_email
 */
class CompanyProfileEmplContacts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'in_company_profile_contacts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address_one', 'public_phone', 'direction_id'], 'required'],
            [['direction_id'], 'integer'],
            [['public_phone'], 'string', 'max' => 20],
            [['address_one', 'address_two', 'public_email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'direction_id' => 'Direction',
            'address_one' => 'Address One',
            'address_two' => 'Address Two',
            'public_phone' => 'Public Phone',
            'public_email' => 'Public Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompaniesEmplContacts()
    {
        return $this->hasOne(CompaniesEmplContacts::className(), ['contact_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanies()
    {
        return $this->hasOne(CompanyInfo::className(), ['user_id' => 'company_id'])->viaTable('in_companies_contacts', ['contact_id' => 'id']);
    }


}
