<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle {

//    public $basePath = '@webroot';
//    public $baseUrl = '@web';
    public $sourcePath = '@bower/ace-admin-v9/';
    public $jsOptions = array(
        'position' => \yii\web\View::POS_HEAD
    );
    public $css = [
//        'css/site.css',
        "assets/css/bootstrap.min.css",
        "assets/css/font-awesome.min.css",
        "assets/css/ace-fonts.css",
        "assets/css/ace.min.css",
        "assets/css/ace-rtl.min.css",
        "assets/css/ace-skins.min.css",
   ];
    public $js = [
        "assets/js/bootstrap.min.js",
        "assets/js/typeahead-bs2.min.js",
        "assets/js/jquery-ui-1.10.3.custom.min.js",
        "assets/js/jquery.ui.touch-punch.min.js",
        "assets/js/jquery.slimscroll.min.js",
        "assets/js/jquery.easy-pie-chart.min.js",
        "assets/js/jquery.sparkline.min.js",
        "assets/js/flot/jquery.flot.min.js",
        "assets/js/flot/jquery.flot.pie.min.js",
        "assets/js/flot/jquery.flot.resize.min.js",
        "assets/js/ace-elements.min.js",
        "assets/js/ace.min.js",
        "assets/js/ace-extra.min.js",
        "assets/custom/js/yii-override-popup.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];

}
