<?php

namespace app\modules\bizley\podium\src\assets;

use yii\web\AssetBundle;

/**
 * Podium Assets
 *
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.1
 */
class PodiumAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@podium/css';
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    /**
     * @inheritdoc
     */
    public $css = [
        'css/main.css',
        'css/main_custom.css',
        'css/style.css',
        'css/podium.css'
    ];
    public $js = [
        'js/vendor/jquery.js',
        'js/vendor/owl.carousel.js',
        'js/vendor/popper.js',
        'js/vendor/bootstrap.js',
        'js/vendor/jquery.fancybox.min.js',
        'js/vendor/jquery.nice-select.min.js',
        'js/vendor/jquery.mCustomScrollbar.js',
        'js/vendor/jquery.sticky-kit.js',
        'https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js',
        'https://yastatic.net/share2/share.js',
        'https://code.highcharts.com/highcharts.js',
        'https://code.highcharts.com/highcharts-more.js',
        'https://code.highcharts.com/modules/exporting.js',
        'https://code.highcharts.com/modules/export-data.js',
        'js/script.js',
        'js/scriptmy.js',
    ];
    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
