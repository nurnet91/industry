<?php if (!empty($faqs)): ?>
    <div class="faq-about__main-title  ontent-text">
        <h2>Часто задаваемые вопросы</h2>
    </div>
    <?php foreach ($faqs as $key => $value): ?>
        <div class="faq-about-toggle <?=$key==0 ? 'active' : '' ?>">
            <div class="faq-about-toggle__head">
                <div class="row">
                    <div class="gutters  faq-about-toggle__head-title"><?=$value->question ?></div>
                    <div class="color-light-grey  faq-about-toggle__head-sub"><?=short($value->answer, 60, '...') ?></div>
                </div>
                <button class="faq-about-toggle__btn  toggle-btn"></button>
            </div>
            <div class="faq-about-toggle__body  content-text  <?=$key == 0 ? '' : 'hidden' ?>">
                <p><?=$value->answer ?></p>
            </div>
        </div>
    <?php endforeach ?>
    <!-- <div class="faq-about-toggle active">
        <div class="faq-about-toggle__head">
            <div class="row">
                <div class="gutters  faq-about-toggle__head-title">Могу ли я вам доверять?</div>
                <div class="color-light-grey  faq-about-toggle__head-sub">Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру вебмастеру</div>
            </div>
            <button class="faq-about-toggle__btn  toggle-btn  active"></button>
        </div>
        <div class="faq-about-toggle__body  content-text">
            <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. </p>
        </div>
    </div>
    <div class="faq-about-toggle">
        <div class="faq-about-toggle__head">
            <div class="row">
                <div class="gutters  faq-about-toggle__head-title">Могу ли я вам доверять?</div>
                <div class="color-light-grey  faq-about-toggle__head-sub">Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру вебмастеру</div>
            </div>
            <button class="faq-about-toggle__btn  toggle-btn"></button>
        </div>
        <div class="faq-about-toggle__body  content-text  hidden">
            <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. </p>
        </div>
    </div>
    <div class="faq-about-toggle">
        <div class="faq-about-toggle__head">
            <div class="row">
                <div class="gutters  faq-about-toggle__head-title">Могу ли я вам доверять?</div>
                <div class="color-light-grey  faq-about-toggle__head-sub">Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру вебмастеру</div>
            </div>
            <button class="faq-about-toggle__btn  toggle-btn"></button>
        </div>
        <div class="faq-about-toggle__body  content-text  hidden">
            <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. </p>
        </div>
    </div> -->
<?php endif ?>