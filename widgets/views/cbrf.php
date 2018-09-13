
<?php if(!empty($model)):?>
<div class="courses">
    <div class="container">
        <div class="courses__title">Курсы валют ЦБ РФ</div>
        <div class="row  justify-content-center  align-items-center">
            <?php foreach ($model as $key => $value):?>
                <?php $dynamic_count = abs(count($value['dynamic'])-2)?>
                <?php $dynamic = $value['dynamic'][$dynamic_count]['value'] - $value['value']; ?>
                <?php if ($dynamic < 0): ?>
                    <?php $class = 'up'; ?>
                <?php else: ?>
                    <?php $class = 'down'; ?>
                <?php endif;?>
                <a href="#" class="courses__course  course  <?=$class?>">
                    <span class="courses__course-in">
                        <span class="flag-icon  <?=Icon($value)?>">img-tag-can-be-here</span>
                        <span class="course__currency"><?= $value['char_code'] ?></span>
                        <span class="course__value"><?= $value['value'] ?></span>
                        <span><i class="fa fa-caret-down"></i><?= round($dynamic, 3) ?></span>
                    </span>
                </a>
            <?php endforeach;?>
        </div>
    </div>
</div>
<?php endif;?>
<?php function Icon($value){
    if($value['char_code'] =='GBP'){
        return 'flag-icon_en';
    }
    if($value['char_code'] =='USD'){
        return 'flag-icon_us';
    }
    if($value['char_code'] =='EUR'){
        return 'flag-icon_eu';
    }
    if($value['char_code'] =='UAH'){
        return 'flag-icon_ua';
    }

}?>
