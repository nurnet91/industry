<?php

namespace app\models;

use Yii;
use yii\base\Model;

class ContactForm extends Model {

    public $name;
    public $email;
    // public $subject;
    public $body;
    // public $verifyCode;

    public function rules() {

        return [
            [['name', 'email', 'body'], 'required'],
            ['email', 'email'],
            // ['verifyCode', 'captcha'],
        ];

    }

    public function attributeLabels() {

        return [
            'name' => 'Name',
            'email' => 'Email',
            'body' => 'Body',
            // 'verifyCode' => 'Verification Code',
        ];

    }

    public function sendTo($email) {

        if ($this->validate()) {

            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([$this->email => $this->name])
                ->setSubject('Message from contact form')
                // ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();

            return true;

        }

        return false;

    }

}
