<?php

namespace app\modules\gallery\widgets\FileUploadWidget;

use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\widgets\InputWidget;

class FileUploadWidget extends InputWidget {

    public $pluginOptions;
    public $pluginEvents;

    public function run(){
        return $this->render('FileUploadWidget', [
            'model' => $this->model,
            'attribute' => $this->attribute,
        ]);
    }

}