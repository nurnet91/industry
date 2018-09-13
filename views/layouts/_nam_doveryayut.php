<?php

use yii\helpers\Html;

$lang = Yii::$app->language;

$reviews = \app\models\Reviews::find()->select('id, author_'.$lang.', review_text_'.$lang.', author_desc_'.$lang.', author_photo')->where(['status' => 1])->all();

?>

<div class="testimonials">
	<div  class="testimonials__title  content-text"><h2>Нам доверяют</h2></div>
	<div class="popup_slide_testim owl-carousel  owl-carousel_dots_blue">

        <?php $q = 0; foreach($reviews as $item): ?>
            <?php if($q > 1) $q = 0; ?>
            <?php if($q == 0): ?>
                <div class="item">
            <?php endif; ?>
            <?php if($q == 0): ?>
                <div class="flex jcsb">
                    <div class="left">
                        <div class="user_pic"><?= Html::img($item->author_photo, ['class' => 'img']) ?></div>
                    </div>
                    <div class="right">
                        <div class="testim"><?= $item->review_text ?></div>
                        <div class="user_name">
                            <span><?= $item->author ?></span>
                            <?= $item->author_desc ?>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="flex jcsb">
                    <div class="right">
                        <div class="testim"><?= $item->review_text ?></div>
                        <div class="user_name">
                            <span><?= $item->author ?></span>
                            <?= $item->author_desc ?>
                        </div>
                    </div>
                    <div class="left">
                        <div class="user_pic"><?= Html::img($item->author_photo, ['class' => 'img']) ?></div>
                    </div>
                </div>
                </div>
            <?php endif; ?>
            <?php $q++; ?>
        <?php endforeach; ?>
	</div>
</div>