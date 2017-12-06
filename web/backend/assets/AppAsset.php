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
        '../shoppy/web/css/bootstrap.css',
        '../shoppy/web/css/demo-page.css',
        '../shoppy/web/css/examples.css',        
        '../shoppy/web/css/font-awesome.css',
        '../shoppy/web/css/geochart.css',
        '../shoppy/web/css/hover.css',
        '../shoppy/web/css/magnific-popup.css',
        '../shoppy/web/css/style.css',
        '../shoppy/web/css/custom.css',
    ];
    public $js = [

        '../shoppy/web/js/jquery-2.1.1.min.js',
        '../shoppy/web/js/jquery.magnific-popup.js',
        '../shoppy/web/js/jquery.nicescroll.js',
        '../shoppy/web/js/bootstrap.js',
        '../shoppy/web/js/bars.js',        
        '../shoppy/web/js/Chart.min.js',
        '../shoppy/web/js/chartinator.js',
        '../shoppy/web/js/gmaps.js',
        '../shoppy/web/js/modernizr.min.js',
        '../shoppy/web/js/nivo-lightbox.min.js',
        '../shoppy/web/js/scripts.js',
        '../shoppy/web/js/skycons.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
