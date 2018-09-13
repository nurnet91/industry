<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\IhAbout */

$this->title = 'Create Ih About';
$this->params['breadcrumbs'][] = ['label' => 'Ih Abouts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ih-about-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
