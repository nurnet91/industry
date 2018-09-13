<?php

namespace app\widgets;


use app\models\FilterAttributes;
use app\models\FilterEquipmentManufacturers;
use app\models\FilterEquipmentTypes;
use app\models\FilterOperations;
use app\models\FilterTechnologies;
use yii\base\Widget;

class FilterWidget extends Widget
{
    public $form;

    public function init()
    {
        if(!empty($this->form)){
            return false;
        }
    }

    public function run(){
        $this->render('filter',$this->data);
    }

    public function getData(){
        //TODO ГАВНО КОД НАДО ПОПРАВИТ И СДЕЛАТ РЕКУРЦИЮ parent_id гавно код написал кто делал фильтри
        $filteAttributes = FilterAttributes::allList();
        $filterEquipmentsManufactures = FilterEquipmentManufacturers::allList();
        $filterEquipmentsTypes = FilterEquipmentTypes::allList();
        $filterOperations = FilterOperations::allList();
        $filterTechnology = FilterTechnologies::allList();
        $dataFilter = [
            $filteAttributes=>'filteAttributes',
            $filterEquipmentsManufactures=>'filterEquipmentsManufactures',
            $filterEquipmentsTypes=>' filterEquipmentsTypes',
            $filterOperations=>'filterOperations',
            $filterTechnology=>'filterTechnology',
        ];
        return  array_merge($this->form,$dataFilter);
    }
}