<?php

namespace app\components;


use Yii;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;
class DateTimeBehavior extends AttributeBehavior
{
    public $year;
    public $format ='Y-m-d h:m:s';
    public $month;
    public $minutes;
    public $hours;
    public $day;
    public $attribute;
    public $second = 0;
    public $dateAttributes = [];
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_INSERT =>'dbDate',
        ];
    }
    public function init()
    {
       if($this->second != 0){
           $this->second = $this->owner->{$this->second};
       }
    }

    public function dbDate()
    {
        $this->owner->{$this->attribute} = $this->date;
    }

    public function getDate(){
        $date = Yii::$app->formatter->asDatetime(
            $this->owner->{$this->year}.'-'.
            $this->owner->{$this->month}.'-'.
            $this->owner->{$this->day}.' '.
            $this->owner->{$this->hours}.':'.
            $this->owner->{$this->minutes}.':'.$this->second
            ,$this->format);
        return $date;
    }
}