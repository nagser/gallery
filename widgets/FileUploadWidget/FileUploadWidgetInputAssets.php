<?php

namespace app\modules\gallery\widgets\FileUploadWidget;

use yii\web\AssetBundle;

class FileUploadWidgetInputAssets extends AssetBundle {

    public $sourcePath = '@bower/blueimp-file-upload';
    public $js = [
        'js/jquery.iframe-transport.js',
        'js/vendor/jquery.ui.widget.js',
        'js/jquery.fileupload.js',
        'js/jquery.fileupload-process.js',
    ];
    public $css = [
        'css/jquery.fileupload.css',
    ];
    public $depends = [
        '\app\base\assets\vendors\JqueryUIAsset'
    ];


}