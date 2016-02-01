<?php

namespace app\modules\gallery\components\image;

use demi\image\ImageUploaderBehavior;
use Yii;

class FormImageWidget extends \demi\image\FormImageWidget {

    public function run(){
        /* @var $model ImageUploaderBehavior */
        $model = $this->model;
        /* @var $behavior ImageUploaderBehavior */
        $behavior = $model->geImageBehavior();
        $widgetId = $this->id;
        $cropPluginOptions = [];
        if (!empty($this->cropUrl)) {
            Yii::$app->response->headers->add('Access-Control-Allow-Origin', '*');
            $cropPluginOptions = $this->cropPluginOptions;
            $validatorParams = $behavior->getImageConfigParam('imageValidatorParams');
            if (isset($validatorParams['minWidth'])) {
                $cropPluginOptions['minCropBoxWidth'] = $validatorParams['minWidth'];
            }
            if (isset($validatorParams['minHeight'])) {
                $cropPluginOptions['minCropBoxHeight'] = $validatorParams['minHeight'];
            }
        }
        return $this->render('formImageWidget', [
            'behavior' => $behavior,
            'model' => $model,
            'widgetId' => $widgetId,
            'imageSrc' => $this->imageSrc,
            'deleteUrl' => $this->deleteUrl,
            'cropUrl' => $this->cropUrl,
            'cropPluginOptions' => $cropPluginOptions,
        ]);
    }

}