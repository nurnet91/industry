<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $name;
?>
<!--<div class="site-error">-->
<!---->
<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->
<!---->
<!--    <div class="alert alert-danger">-->
<!--        --><?//= nl2br(Html::encode($message)) ?>
<!--    </div>-->
<!---->
<!--    <p>-->
<!--        The above error occurred while the Web server was processing your request.-->
<!--    </p>-->
<!--    <p>-->
<!--        Please contact us if you think this is a server error. Thank you.-->
<!--    </p>-->
<!---->
<!--</div>-->

<div class="page-404  background"  style="background-image: url(<?= \yii\helpers\Url::to('/images/404-bg.jpg')?>)">
    <div class="page-404__img  img-wrap  text-center">
        <?= Html::img('/images/404-img.png')?>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-10  block-centered">
                <div class="page-404__content   content-text  text-center">
                    <h2>Данная страница пока не существует. Мы все время расширяем портал и, возможно, в скором времени эта страница появится у нас.</h2>
                    <p>Сейчас вы можете сообщить нам об этой ошибке, либо перейти на страницу назад. Спасибо за </p>
                </div>
                <div class="page-404__btns  row  justify-content-center">
                    <a href="<?= Url::to(Yii::$app->request->referrer ?: Yii::$app->homeUrl); ?> " class="page-404__btn  button  margin-b-10  button_white">Назад</a>
                    <a href="#" class="page-404__btn  button  margin-b-10  button_red">Сообщить об ошибке</a>
                </div>
                <form class="page-404__search  form-search">
                    <input type="search" placeholder="Поиск по сайту ..." class="form-search__input-text  input">
                    <button class="form-search__btn  btn-clear"><i class="fa fa-search  " aria-hidden="true"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>