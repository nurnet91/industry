<?php

use app\widgets\Alert;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);

?>

<?php $this->beginPage() ?>

<!DOCTYPE html>

<html lang="<?= Yii::$app->language ?>">

<head>

    <meta charset="<?= Yii::$app->charset ?>">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?= Html::csrfMetaTags() ?>

    <title><?= Html::encode($this->title) ?></title>

    <?php $this->head() ?>

    <script src="/js/vendor/jquery.js"></script>

</head>
<body>

    <?php $this->beginBody() ?>

        <div class="wrap">

            <?=$this->render('_menu_admin') ?>

            <div class="container">

                <?=Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]) ?>

                <?=Alert::widget() ?>
                <?php if (Yii::$app->session->hasFlash('success_message')): ?>
                    <div class="alert alert-success" style="margin: 0;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                        <strong><?=Yii::$app->session->getFlash('success_message') ?></strong>
                    </div>
                <?php endif ?>

                <?php if (Yii::$app->session->hasFlash('error_messade')): ?>
                    <div class="alert alert-danger" style="margin: 0;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                        <strong><?=Yii::$app->session->getFlash('error_messade') ?></strong>
                    </div>
                <?php endif ?>
                <br/>
                <?=$content ?>

            </div>

        </div>

        <footer class="footer">

            <div class="container">

                <p class="pull-left">&copy; My Company <?=date('Y') ?></p>

                <p class="pull-right"><?=Yii::powered() ?></p>

            </div>

        </footer>

    <?php $this->endBody() ?>

</body>

</html>

<?php $this->endPage() ?>
