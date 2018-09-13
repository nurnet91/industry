<?php

use yii\helpers\Html;

$this->title = 'Create Company Profile Variant';
$this->params['breadcrumbs'][] = ['label' => 'Company Profile Variant', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="company-profiles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
