<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'chart.js/Chart.min.css',
        'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
    ];
    public $js = [
        'chart.js/Chart.bundle.min.js'
    ];
    public $depends = [
        'dmstr\web\AdminLteAsset',
    ];
}
