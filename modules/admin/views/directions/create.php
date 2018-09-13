<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Directions */

$this->title = 'Create Directions';
$this->params['breadcrumbs'][] = ['label' => 'Directions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="directions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
