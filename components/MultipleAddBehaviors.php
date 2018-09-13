<?php

namespace app\components;


use yii\base\Behavior;
use yii\db\ActiveRecord;

class MultipleAddBehaviors extends Behavior
{
    public $multiAttribute;
    public $relationName;
    public $modelRelationName;
    private $_ids;


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
        }
    }

    public function afterInsert()
    {
        if (!empty($this->ids)) {
            $modelRelationName = $this->modelRelationName;
            $companies = $modelRelationName::find()->andWhere(['in', 'id', $this->_ids])->all();
            foreach ($companies as $company) {
                $this->owner->link($this->relationName, $company);
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

}