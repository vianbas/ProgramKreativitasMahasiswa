<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    //public $basePath = '@webroot';
    //public $baseUrl = '@web';
    public $sourcePath = '@bower/fedora/';
    public $png = [
        'assets/img/apple-icon-144x144px.png',
        'assets/img/apple-icon-114x114px.png',
    ];
    public $ico = [
        'assets/img/favico.ico',
    ];
    public $css = [
        'style.css',
        'css/site.css',
        'assets/css/responsive.css',
        'assets/css/shortcode.css',
        'assets/css/woocommerce.css',
        'assets/3rd/pretty-photo/pretty-photo.css',
        'assets/3rd/layerslider/css/layerslider.css',
        'assets/3rd/font-awesome/font-awesome.css',
     
    ];
    public $js = [
        'assets/3rd/jquery/jquery-core.js',
	'assets/3rd/jquery/jquery-ui.js',
	'assets/3rd/jquery/jquery-tinynav.js',
        'assets/3rd/jquery/jquery-isotope.js',
	'assets/3rd/jquery/jquery-flexslider.js',
	'assets/3rd/jquery/jquery-countdown.js',
	'assets/3rd/jquery/jquery-masonry.js',
	'assets/3rd/jquery/jquery.leanModal.min.js',
	'assets/3rd/jquery/jquery-validate.js',
	'assets/3rd/pretty-photo/pretty-photo.js',
	'assets/3rd/layerslider/js/greensock.js',
	'assets/3rd/layerslider/js/layerslider.kreaturamedia.jquery.js',
	'assets/3rd/layerslider/js/layerslider.transitions.js',
	'assets/js/theme.js',
	'assets/js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
