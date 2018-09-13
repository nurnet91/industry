<?php

/**
 * Podium Module
 * Yii 2 Forum Module
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.1
 */

use app\modules\bizley\podium\src\assets\PodiumAsset;
use app\modules\bizley\podium\src\helpers\Helper;
use app\modules\bizley\podium\src\widgets\Alert;
use yii\helpers\Html;

PodiumAsset::register($this);
$this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<meta charset="<?= Yii::$app->charset ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?= Html::csrfMetaTags() ?>
<title><?= Html::encode(Helper::title($this->title)) ?></title>
<?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="container">
        <?= $this->render('/elements/main/_navbar') ?>
        <?= $this->render('/elements/main/_breadcrumbs') ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
    <?= $this->render('/elements/main/_footer') ?>
<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
