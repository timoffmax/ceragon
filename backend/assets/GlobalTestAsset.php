<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Global test backend application asset bundle.
 */
class GlobalTestAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $js = [
        'js/global-test/index.js',
    ];
}
