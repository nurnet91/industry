<?php

namespace app\models;

use Yii;
use yii\base\Model;

class RegisterUser extends Model {

    public $login;

    public $email;

    public $password;

    public $repassword;

    public $agree;

    public $social_id;

    public $social_name;

    public $auth_key;

    public $social_url;

    public $photo;

    public $sex;

    public $status;

    private $_user = false;

    public function rules() {

        return [

            [['login', 'email', 'password', 'repassword', 'agree'], 'required'],
            [['login'], 'string', 'min' => 4, 'max' => 250],
            [['password'], 'string', 'min' => 8, 'max' => 250],
            [['social_id', 'social_name', 'social_url', 'auth_key', 'photo'], 'string', 'max' => 255],
            ['email', 'email'],
            [['agree', 'sex', 'status'], 'integer'],
            ['email', 'validateEmail'],
            ['repassword', 'compare', 'compareAttribute' => 'password', 'message' => 'Passwords don\'t match'],
            ['login', 'validateLogin'],
            ['agree', 'validateAgree'],

        ];

    }

    public function validateLogin($attribute, $params) {

        if($user = Users::findByUsernameAll($this->login)){

            $this->addError($attribute, 'This login has been taken.');

        }

    }

    public function validateEmail($attribute, $params) {

        if($user = Users::findByEmailAll($this->email)){

            $this->addError($attribute, 'This email has been taken.');

        }

    }

    public function validateAgree($attribute, $params) {

        if($this->agree != 1){

            $this->addError($attribute, 'Check please agreement.');

        }

    }

    public function loadFromSocial($eauth) {

        $s_id = (string)$eauth->getId();

        $s_name = $eauth->getAttribute('email');

        $s_service_name = $eauth->getServiceName();

        $s_email = $eauth->getAttribute('email');

        $verified_email = $eauth->getAttribute('verified_email');

        $s_auth_key = md5($s_service_name . '-' . $s_id);
        
        $s_password = $s_id . uniqid();

        /*____________________________________________________________*/

        $this->login = $s_name;

        $this->email = $s_email;

        $this->password = $s_password;

        $this->repassword = $s_password;

        $this->status = 1;

        $this->agree = 1;

        $this->social_id = (string)$s_id;

        $this->social_name= $eauth->getServiceName();

        $this->auth_key = $s_auth_key;

        $this->social_url= $eauth->getAttribute('url');

        $this->sex = $eauth->getAttribute('gender');

        $this->photo = $eauth->getAttribute('photo');
        
    }

}
