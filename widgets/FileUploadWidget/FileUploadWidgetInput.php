<?php

namespace app\modules\gallery\widgets\FileUploadWidget;

use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\widgets\InputWidget;

class FileUploadWidgetInput extends InputWidget
{
    public $pluginOptions;
    public $pluginEvents;

    public function init()
    {
        parent::init();
        $this->pluginOptions = ArrayHelper::getValue($this->options, 'pluginOptions', []);
        $this->pluginEvents = ArrayHelper::getValue($this->options, 'pluginEvents', []);
        FileUploadWidgetInputAssets::register($this->getView());
    }

    public function run()
    {
        $id = ArrayHelper::getValue($this->options, 'formId', 'w0');
        $options = Json::encode($this->pluginOptions);
        $view = $this->getView();
        $js[] = "$('#$id').fileupload($options);";
        if (count($this->pluginEvents)) {
            foreach ($this->pluginEvents as $event => $handler) {
                $js[] = "$('#$id').on('$event', $handler);";
            }
        }
        $view->registerJs(implode("\n", $js));
        return $this->render('FileUploadWidgetInput', [
            'model' => $this->model,
            'attribute' => $this->attribute,
        ]);
    }
}