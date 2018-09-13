<?php

namespace app\models;


use app\components\FileUploadBehavior;
use app\components\UploadBehavior;
use yii\base\Model;
use yii\helpers\ArrayHelper;

class VacancyForm extends Model
{


   public $link_profile;
   public $company_name;
   public $vacancy_name;
   public $file;
   public $dataFile;
   public $imageFile;
   public $logo;

    public function rules()
    {
        return [
            [['link_profile','dataFile'], 'safe'],
            [['imageFile', 'company_name', 'vacancy_name', 'dataFile','logo'], 'string', 'max' => 255],
            [['company_name','vacancy_name'],'required'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_name' => 'Company Name',
            'vacancy_name' => 'Vacancy Name',
            'link_profile' => 'Link Profile',
            'dataFile' => 'File',
            'imageFile'=>'logo'
        ];
    }





}