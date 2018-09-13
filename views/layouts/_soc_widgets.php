<?php

use app\models\SocialNetworks;
use yii\helpers\Html;

$SocialNetworks = SocialNetworks::find()->select('id, name, widget_content, social_icon')->where(['status' => 1, 'on_widgets' => 1])->orderBy('norder')->all();

?>

<div class="footer__custom  footer_custom  col-sm-4 col-lg-3">
    <div class="footer_custom__titile  title">Подпишитесь на наши страницы в соцсетях:</div>
    <div class="social-widget">
        <nav>
            <div class="nav nav-tabs">

                <?php $i = 0; foreach ($SocialNetworks as $socNet): ?>

                    <a class="nav-item nav-link <?php if($i == 0) echo 'active'?>" data-toggle="tab" href="#nav-soc-<?= $socNet->name?>"><?= Html::img('/' . $socNet->social_icon, ['alt' => $socNet->name]) ?></a>

                <?php $i++; endforeach; ?>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">

            <?php $c = 0; foreach ($SocialNetworks as $socNet): ?>

                <div class="tab-pane fade<?php if($c == 0) echo ' show active'?>" id="nav-soc-<?= $socNet->name ?>">

                    <?= $socNet->widget_content?>

                </div>

            <?php $c++; endforeach; ?>


        </div>

    </div>
</div>
