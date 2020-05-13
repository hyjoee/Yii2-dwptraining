<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'chart.js/Chart.min.css',
        'css\cv.css'
    ];
    public $js = [
        'chart.js/Chart.bundle.min.js'
    ];
    public $depends = [
        'dmstr\web\AdminLteAsset',
    ];
}
