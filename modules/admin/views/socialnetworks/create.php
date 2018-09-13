<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SocialNetworks */

$this->title = 'Create Social Networks';
$this->params['breadcrumbs'][] = ['label' => 'Social Networks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="social-networks-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
