<?php

use app\models\SocialNetworks;
use yii\helpers\Html;
use yii\helpers\Url;

$socNets = SocialNetworks::find()->select(['id','name','url','social_icon'])->where(['status'=>1])->orderBy(['norder'=>SORT_ASC])->all();

?>

<div class="soc_title">
    Следите за нами в социальных сетях:
</div>
<ul class="soc_button">
    <?php foreach ($socNets as $soc): ?>
        <li>
        	<a href="<?=Url::to($soc->url) ?>" target="_blank"><?=Html::img('/' . $soc->social_icon, ['options' => ['alt' => $soc->name]]) ?></a>
        </li>
    <?php endforeach; ?>
</ul>