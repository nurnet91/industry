
<div class="instruction">
    <div class="container">
        <a href="#" class="instruction__link">Краткая инструкция по работе с кабинетом компании</a>
    </div>
</div>
<div class="company-office">
    <div class="company-office__container  container">
        <div class="company-office__row  row">
            <button class="company-office__btn-menu  company-office__btn-menu_call  animated  pulse_bigger  infinite"><i class="fa fa-bars" aria-hidden="true"></i></button>
            <?=
            $this->render('_sidebar',['active'=>'webinars']);
            ?>
            <div class="company-office-content  col-md-8  col-lg-9  block-margin-adaptive">
                <?= \app\widgets\WebinarsFormWidget::widget()?>
                <?=$this->render('_organize_webinars',compact('model'))?>
                <?=$this->render('_my_webinars',compact('model'))?>
            </div>
        </div>
    </div>
</div>
		