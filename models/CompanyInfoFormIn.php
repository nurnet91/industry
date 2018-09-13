<?php

namespace app\models;


use yii\base\Model;

class CompanyInfoFormIn extends Model
{
    public $email;

    public $first_name;

    public $last_name;

    public $middle_name;

    public $name;

    public $inn;

    public $phone;

    public function rules() {

        return [
            [['first_name','name','email','middle_name','phone','last_name','inn'],'required'],
            ['email', 'email'],
            [['first_name','last_name','middle_name','name','inn','phone'],'string'],
            ['email','validateEmail'],
            [['phone'],'number'],
        ];

    }
    public function attributeLabels()
    {
        return [
            'id' => t('ID'),
            'first_name' => t('Имя'),
            'last_name' => t('Фамилия'),
            'middle_name' => t('Отчество'),
            'name' => t('Название компании'),
            'email' => t('Е-маил'),
            'inn' => t('ИНН компании'),
            'phone' => t('Номер телефона'),
        ];
    }


    public function validateEmail($attribute, $params) {

        if($user = Users::findByEmailAll($this->email)){

            $this->addError($attribute, t('Такой Е-маил уже исползуеться.'));

        }

    }


}