<?php

use yii\helpers\Html;

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Countries', 'url' => ['countries/index']];
$this->params['breadcrumbs'][] = ['label' => "Cities - ".$country->name_ru, 'url' => ['index', 'country_id' => $country->id]];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="cities-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model]) ?>

</div>
