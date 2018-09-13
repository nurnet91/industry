<?php
dd($dataProvider);
$about = $model->about;
if(!empty($about)){
//   $about = \yii\helpers\ArrayHelper::index(\yii\helpers\ArrayHelper::toArray($about),'direction_id');
   $description = $about[0]->description;
   foreach($about as $item =>$value){
       if($value->direction_id == Yii::$app->request->queryParams['direction']){
           $description = $value->description;
       }
   }
   if(empty($description)){
       $description = '';
   }

}else{
    $description = '';
}
?>
        <div class="row  justify-content-between  align-items-center">
            <div class="results_block__company_info  company_info  col-12  col-lg-9  col-xl-8">
                <div class="row">
                    <div class="col-sm-auto">

                        <label class="results_block__check-label  checkbox-label">
                            <input type="checkbox" class="checkbox-label__input-check  comp_name" data-id="<?=$model->companyinfo->id?>" data-text="<?=$model->companyinfo->name?>">
                            <span class="checkbox-label__pseudo-check"></span>
                        </label>
                    </div>
                    <div class="results_block__info-box  col-sm">
                        <div class="company_info_box flex">
                            <div class="company_info_box__title  content-text"><h3><a href="<?=$model->companyinfo->singleLink?>"><?=$model->companyinfo->name?></a></h3></div>
                            <span><img src="/images/temp/stars_yellow.png" alt="">(9/10)</span>
                            <div class="wit_small"><img src="/images/wit_small.png" alt=""></div>
                        </div>
                        <div class="text_block">
                                <p>
                                   <?=$description?>
                                </p>

                        </div>

                    </div>
                </div>
            </div>
            <div class="results_block__buttons  col-12  col-lg-3  col-xl-4">

                <a href="#forms" class="results_block__btn  results_block__btn_large  button  button_green button-placing"><i class="fa fa-share-square-o" aria-hidden="true"></i>Сделать запрос</a>
            </div>
        </div>
