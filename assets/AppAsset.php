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
        'node_modules/bootstrap/dist/css/bootstrap.min.css',
        'build/main.min.css'];
    public $js = [
        'node_modules/jquery/dist/jquery.min.js',
        'node_modules/bootstrap/dist/js/bootstrap.min.js',
        'https://maps.googleapis.com/maps/api/js?key=AIzaSyBs3fhRSzXqbC68gPAJBqrz-Rs_AXEfaMA&sensor=false&libraries=places',
        'js/main.js'
    ];
    public $depends = [
    ];
}