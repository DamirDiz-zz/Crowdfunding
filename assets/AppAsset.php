<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'build/main.min.css'];
    public $js = [
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js',
        //'https://maps.googleapis.com/maps/api/js?key=AIzaSyBs3fhRSzXqbC68gPAJBqrz-Rs_AXEfaMA&callback=initMap',
        'https://maps.googleapis.com/maps/api/js?key=AIzaSyBs3fhRSzXqbC68gPAJBqrz-Rs_AXEfaMA&sensor=false&libraries=places',
        //'http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places',
        'js/main.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}