<?php

namespace app\models;

use yii\base\Model;

class RegisterCompanyForm extends Model {

    public $username;

    public $email;

    public $first_name;

    public $last_name;

    public $middle_name;

    public $name;

    public $inn;

    public $comment;

    public $promo_code;

    public $type;

    public $payment_type;

    public $phone;

    public $company_variant_id;

    public $role_id;

    public $checkbox;

    public $agree;

    public $country_id;

    public $region_id;

    public function rules() {

        return [
            [['first_name','name','email','middle_name','phone','last_name','inn'],'required'],
            [['username'], 'string', 'min' => 4, 'max' => 250],
            ['email', 'email'],
            [['first_name','last_name','middle_name','name','inn','comment','promo_code','phone'],'string'],
            [['company_variant_id','payment_type','type'],'integer'],
            [['role_id'],'default','value'=>Users::ROLE_COMPANY],
            ['name','validateLogin'],
            ['email','validateEmail'],
            [['username'],'default','value'=>function(){
                    return $this->name;
            }],
            [['company_variant_id'],'integer','min'=>1,'max'=>3],
            [['payment_type'],'integer','min'=>1,'max'=>2],
            [['type'],'integer','min'=>1,'max'=>2],
            [['phone'],'number'],
            ['agree','validateAgree'],
            [['updated_at','created_at'],'safe'],
            [['country_id','region_id'],'integer'],
            [['country_id','region_id'],'default','value'=>0]
        ];

    }

    public function attributeLabels() {

        return [
            'id' => t('ID'),
            'first_name' => t('Имя'),
            'last_name' => t('Фамилия'),
            'middle_name' => t('Отчество'),
            'name' => t('Название компании'),
            'email' => t('Е-маил'),
            'inn' => t('ИНН компании'),
            'phone' => t('Номер телефона'),
            'comment' => t('Комментарии'),
            'created_at' => t('Created At'),
            'updated_at' => t('Updated At'),
            'promo_code' => t('Promo Code'),
            'type' =>t('Type'),
        ];

    }

    public function validateLogin($attribute, $params) {

        if($user = Users::findByUsernameAll($this->name)){

            $this->addError($attribute, t('Такой названые компании уже исползуеться.'));

        }

    }

    public function validateEmail($attribute, $params) {

        if($user = Users::findByEmailAll($this->email)){

            $this->addError($attribute, t('Такой Е-маил уже исползуеться.'));

        }

    }
    
    public function validateAgree($attribute, $params) {

        if($this->agree != 1){

            $this->addError($attribute, t('Подтвердите согласие'));

        }

    }

}