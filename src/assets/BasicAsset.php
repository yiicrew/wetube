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
class BasicAsset extends AssetBundle
{
    public $sourcePath = '@app/themes/basic/assets';
    public $css = [
        'css/site.css',
    ];
    public $js = [
        'js/site.js'
    ];
    public $depends = [
        'yii\jquery\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
    public $publishOptions = [
        'forceCopy' => YII_DEBUG
    ];
}
