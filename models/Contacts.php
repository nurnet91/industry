<?php

namespace app\models;

use Yii;
use app\models\queries\ContactsQuery;

class Contacts extends \yii\db\ActiveRecord {
    
    public static function tableName() {

        return 'in_b_contacts';

    }

    public function rules() {

        return [
            [['emailes'], 'required'],
            [['status'], 'integer'],
            [['company_name', 'adres', 'phones', 'emailes'], 'string', 'max' => 255],
            [['lat', 'lon'], 'string', 'max' => 100],
        ];

    }

    public function attributeLabels() {

        return [
            'id'            => 'ID',
            'company_name'  => 'Company Name',
            'adres'         => 'Adres',
            'lat'           => 'Lat',
            'lon'           => 'Lon',
            'phones'        => 'Phones',
            'emailes'       => 'Emailes',
            'status'        => 'Status',
        ];

    }

    public function getPhonelist() {

        $phones = [];

        if (!empty($this->phones)) {

            $ph = explode(',', $this->phones);

            foreach ($ph as $key => $value) {

                $pval = trim($value);

                $pval = trim($pval, '+');

                $pkey = str_replace(' ', '', $pval);

                $pkey = '+'.$pkey;

                $phones[$pkey] = $pval;
                
            }

        }

        return $phones;

    }

    public function getEmaillist() {

        $emailes = [];

        if (!empty($this->emailes)) {

            $em = explode(',', $this->emailes);

            foreach ($em as $key => $value) {

                $eval = trim($value);

                $ekey = str_replace(' ', '', $eval);

                $emailes[$ekey] = $eval;
                
            }
            
        }

        return $emailes;
        
    }

    public static function find() {
        
        return new ContactsQuery(get_called_class());

    }
    
}
