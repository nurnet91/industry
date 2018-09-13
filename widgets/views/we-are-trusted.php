<?php use yii\helpers\Html;
?>

<?php if($reviews):?>
<div class="testimonials">
    <div class="testimonials__container  container">
        <h2 class="h2"><a href="/main/about" target="_blank"><?=
                t('Нам доверяют')?></a></h2>
        <div class="slide_testim owl-carousel  owl-carousel_nav_angle  owl-carousel_nav_angle_blue  owl-carousel_dots_blue  owl-theme">
            <?php foreach($reviews as $item): ?>
                <div class="slide_testim__item  item  flex  justify-content-between">
                    <div class="testimonials__left  left">
                        <div class="user_pic"><?= Html::img('/'.$item->author_photo, ['class' => 'img']) ?></div>
                        <div class="user_name">
                            <span><?= $item->author ?></span>
                            <?= $item->author_desc ?>
                        </div>
                    </div>
                    <div class="testimonials__right  right">
                        <div class="testimonials__testim  testim"><?= $item->review_text ?></div>
                        <a href="/main/company-registration" class="slide_testim__btn  button  button_green"><span><?=
                                t('Зарегистрировать компанию')?></span></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php endif;?>
