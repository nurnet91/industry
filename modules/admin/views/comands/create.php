<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Comands */

$this->title = 'Create Comands';
$this->params['breadcrumbs'][] = ['label' => 'Comands', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comands-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
