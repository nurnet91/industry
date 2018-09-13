<?php


use app\models\Categories;
use app\modules\bizley\podium\src\widgets\Alert;
use yii\helpers\Html;
use app\assets\AppAssetIndex;
//    qq(str_pad(Yii::$app->request->url,6));

\app\modules\bizley\podium\src\assets\PodiumAsset::register($this);

$lan = Yii::$app->language;
$langs = Yii::$app->params['languages'];
$footer = Categories::find()->select(['id', 'name_'.$lan, 'footer_position'])->where(['on_footer' => 1, 'status' => 1])->all();

?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes">
        <meta name="google-site-verification" content="Q7MM0k-xM_ezH3kodjfm3MyyjJ6IiOg6YQIswXfdoT0" />
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>

    </head>

    <body class="body" data-spy="scroll" data-target="header" data-offset="60">
    <?php $this->beginBody() ?>

    <div class="site_wrap">
        <header class="header background-color-dark-grey">
            <div class="header__main">
                <div class="container">
                    <div class="row justify-content-center  justify-content-sm-between  align-items-center">

                        <a href="/" class="header__logo  logo col-sm-5  col-md-5  col-lg-3"><img src="/images/logo.png" alt=""></a>
                        <a href="/" class="header__logo-mob  logo_mob hidden  gutters"><img src="/images/logo_mob.png" alt=""></a>

                        <div class="header__social  social  col-md-3  col-xl-4">

                            <?=$this->render('_social'); ?>

                        </div>

                        <div class="header__settings  settings_bar  col-sm-7  col-md-5  col-lg-4  col-xl-3">
                            <div class="settings flex jcsb  align-items-center">

                                <?=$this->render('_language', ['langs' => $langs, 'lan' => $lan]); ?>

                                <!-- <a href="#" class="faq"><i class="fa fa-question" aria-hidden="true"></i>FAQ</a> -->

                                <?=$this->render('_auth_block'); ?>

                                <button class="hamburger  hamburger_main_menu  btn-clear"><i class="fa fa-bars" aria-hidden="true"></i></button>

                            </div>
                            <form class="form-search">
                                <input type="search" placeholder="Поиск по сайту ..." class="form-search__input-text  input">
                                <button class="form-search__btn  btn-clear"><i class="fa fa-search  " aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header_menu">

                <?=$this->render('_menu'); ?>

                <div class="header_menu__social  socials hidden">

                    <?=$this->render('_social'); ?>

                </div>
                <div class="header_menu__close  close hidden"><i class="fa fa-times" aria-hidden="true"></i></div>

            </div>

            <?php if (Yii::$app->session->hasFlash('error')): ?>
                <div class="alert alert-danger" style="margin: 0;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                    <strong><?=Yii::$app->session->getFlash('error') ?></strong>
                </div>
            <?php endif ?>

            <?php if (Yii::$app->session->hasFlash('nmessage')): ?>
                <div class="alert alert-success" style="margin: 0;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                    <strong><?=Yii::$app->session->getFlash('nmessage') ?></strong>
                </div>
            <?php endif ?>

        </header>

        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <?= $this->render('/elements/main/_navbar') ?>
                </div>
                <div class="col-lg-8">
                    <?= $this->render('/elements/main/_breadcrumbs') ?>
                    <?= Alert::widget() ?>
                    <?= $content ?>
                </div>
            </div>

        </div>
        <?= $this->render('/elements/main/_footer') ?>

        <footer class="footer">
            <div class="container">
                <div class="row  justify-content-center  justify-content-sm-between">

                    <?=$this->render('_footer_menu', ['footer' => $footer]); ?>

                    <?=$this->render('_soc_widgets'); ?>

                </div>
            </div>
            <div class="footer__copy  copy">
                <div class="copy__copyright  copyright">© Industry Hunter, 2018. Все права защищены.</div>
                <a href="#" class="blue">Правила и политика безопасности</a>
            </div>
        </footer>

        <?php if (Yii::$app->user->isGuest): ?>

            <?=$this->render('_login'); ?>

            <?=$this->render('_register'); ?>

            <?=$this->render('_step_register'); ?>

        <?php endif ?>


    </div><!-- site_wrap -->
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>