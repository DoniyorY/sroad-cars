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
        //'css/site.css',
        'assets/css/bootstrap.min.css',
        'assets/css/icons.min.css',
        'assets/css/app.min.css',
        'assets/css/custom.min.css',
    ];
    public $js = [
        'assets/libs/bootstrap/js/bootstrap.bundle.min.js',
        'assets/libs/simplebar/simplebar.min.js',
        'assets/libs/node-waves/waves.min.js',
        'assets/libs/feather-icons/feather.min.js',
        'assets/js/pages/plugins/lord-icon-2.1.0.js',
        'assets/js/plugins.js',
        'assets/libs/apexcharts/apexcharts.min.js',
        'assets/js/pages/dashboard-crm.init.js',
        'assets/js/app.js',
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap5\BootstrapAsset',
    ];
}
