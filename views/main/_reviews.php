<?php if (!empty($reviews)): ?>
    <?php foreach ($reviews as $key => $value): ?>
        <div class="trust__item">
            <div class="trust__item-in  testimonials">
                <div class="testimonials__container  container">
                    <h2 class="h2"><a href="#">Нам доверяют</a></h2>
                    <div class="slide_testim  slide_testim_no_slider">
                        <div class="slide_testim__item  item  flex  justify-content-between">
                            <div class="testimonials__left  left">
                                <div class="user_pic">
                                    <?php if (!empty($value->author_photo)): ?>
                                        <img src="/<?=$value->author_photo ?>" alt="">
                                    <?php endif ?>
                                </div>
                                <div class="user_name">
                                    <span><?=$value->author ?></span>
                                    <?=$value->author_desc ?>
                                </div>
                            </div>
                            <div class="testimonials__right  right">
                                <div class="testimonials__testim  testim"><?=$value->review_text ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
<?php endif ?>
<?php if (!empty($rev_com)): ?>
    <div class="trust__item-in  trust-company">
        <div class="container">
            <div class="row">
                <?php foreach ($rev_com as $key => $value): ?>
                    <a href="/main/company-card?id=<?= $value->companyinfo->id ?>" target="_blank" class="trust-company__img  img-wrap  col-6  col-md-4  col-lg-2">
                        <img src="/<?=$value->companyinfo->photo ?>" alt=""  data-toggle="tooltip"  data-placement="top" title='<?=$value->companyinfo->name ?>'>
                    </a>
                <?php endforeach ?>
            </div>
        </div>
    </div>
<?php endif ?>
