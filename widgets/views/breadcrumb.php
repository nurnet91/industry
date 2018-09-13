<?php

use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

?>


    <div class="bread-crumbs  bread-crumbs_blue">
        <div class="container">
<!--            -->
<!--            <ul class="bread-crumbs__list  list  flex  align-items-center">-->
<!--                <li><a href="#">Электроника</a></li>-->
<!--                <li><span>Новости Российских компаний</span></li>-->
<!--            </ul>-->
            <?= Breadcrumbs::widget([
                'homeLink' => ['label' => 'Главная', 'url' => Url::home(),],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                'options' => ['class' => 'bread-crumbs__list  list  flex  align-items-center'],
                'itemTemplate' => "<li>{link}</li>\n",
                'activeItemTemplate' => "<li><span>{link}</span></li>\n"
            ]) ?>
        </div>
    </div>

