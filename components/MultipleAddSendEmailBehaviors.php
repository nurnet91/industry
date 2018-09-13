<?php

namespace app\components;


use Yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\helpers\Url;

class MultipleAddSendEmailBehaviors extends Behavior
{
    public $multiAttribute;

    public $relationName;

    public $modelRelationName;

    private $_ids;

    private $_string;

    public function events()
    {

        return [
            ActiveRecord::EVENT_BEFORE_INSERT => 'beforeInsert',
            ActiveRecord::EVENT_AFTER_INSERT => 'afterInsert',
            ActiveRecord::EVENT_AFTER_DELETE => 'afterDelete',
        ];

    }

    public function beforeInsert($event)
    {
        if (($array = $this->owner->{$this->multiAttribute}) !== null) {
            $this->ids = explode(',', $this->owner->{$this->multiAttribute});
            $this->owner->token = $this->generateToken();
        }
    }

    public function afterInsert()
    {
        if (!empty($this->ids)) {
            $modelRelationName = $this->modelRelationName;
            $companies = $modelRelationName::find()->andWhere(['in', 'id', $this->_ids])->all();
            foreach ($companies as $company) {
                $this->owner->link($this->relationName, $company);
                $this->string .= 'Названые компание' . $company->name . PHP_EOL
                    . 'Адрец компании' . Url::home(true) . $company->singleLink . PHP_EOL;
            }
            if (!Yii::$app->user->isGuest) {
                $this->sendToMail();
            }
        }
    }

    public function getIds()
    {
        return $this->_ids;
    }

    public function setIds($value)
    {
        return $this->_ids = $value;
    }

    public function sendToMail()
    {
        $url = Url::home(true) . "site/confirm/" . $this->owner->token;
        Yii::$app->mailer->compose()
            ->setTo($this->owner->email)
            ->setFrom(['industry2@mail.ru' => 'Industry Hunter'])
            ->setSubject('Подтверждение запросов')
            ->setTextBody($this->string . "<a href='" . $url . "'>" . $url . "</a>")
            ->send();
    }

    public function generateToken()
    {
        return Yii::$app->security->generateRandomString() . '_' . time();
    }

    public function setString($value)
    {
        return $this->_string = $value;

    }

    public function getString()
    {
        return $this->_string;
    }

}