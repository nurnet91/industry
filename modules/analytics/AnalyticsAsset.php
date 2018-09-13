<?php
namespace app\modules\analytics;

use yii\web\AssetBundle;

class AnalyticsAsset extends AssetBundle {
    public $sourcePath = '@app/modules/analytics/assets/';
    
    public $css = [
        'css/analytics.css'
    ];
    
    public $js = [
        'https://www.google.com/jsapi',
        'js/analytics.js',
        'js/main.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\widgets\ActiveFormAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
