<?php

namespace app\components;


use Yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\helpers\FileHelper;

class TextAddToFileBehaviors extends Behavior
{

    public $path;
    public $extension;
    public $attributeText;
    public $attributeFile;

    public function events()
    {

        return [
            ActiveRecord::EVENT_BEFORE_INSERT => 'afterValidate',
        ];

    }

    public function afterValidate()
    {
        if (empty($this->owner->{$this->attributeFile})) {
            $name = $this->path . '/' . Yii::$app->security->generateRandomString() . time() . $this->owner->id .'.'.$this->extension;
            FileHelper::createDirectory($this->path);
            $fp = fopen($name, "w", $this->path);
            fwrite($fp, $this->owner->{Yii::$app->formatter->asNtext($this->attributeText)});
            fclose($fp);
            $this->owner->{$this->attributeFile} = $name;
        }

    }
}