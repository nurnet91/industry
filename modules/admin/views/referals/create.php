<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Referals */

$this->title = 'Create Referals';
$this->params['breadcrumbs'][] = ['label' => 'Referals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="referals-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
