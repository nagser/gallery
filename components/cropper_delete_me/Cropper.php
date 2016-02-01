<?php

namespace app\modules\gallery\components\cropper;

use demi\cropper\CropperAsset;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\helpers\Url;

class Cropper extends \demi\cropper\Cropper {

    public function run(){
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        } else {
            $this->setId($this->options['id']);
        }

        $this->pluginOptions = ArrayHelper::merge($this->defaultPluginOptions, $this->pluginOptions);
        $this->imageOptions = ArrayHelper::merge($this->defaultImageOptions, $this->imageOptions);

        // Set additional cropper js-options
        if (!empty($this->aspectRatio)) {
            $this->pluginOptions['aspectRatio'] = $this->aspectRatio;
        }
        $content = '';
        if ($this->modal) {
            // Modal button
            $buttonOptions = $this->options;
            unset($buttonOptions['id']);
            $content .= Html::a('<i class="fa fa-crop"></i> ' . \Yii::t('gallery', 'Crop'), '#' . $this->id,/**/
                ArrayHelper::merge([
                    'data' => [
                        'toggle' => 'modal',
                        'target' => '#' . $this->id,
                        'crop-url' => Url::to($this->cropUrl),
                    ],
                    'class' => 'btn btn-primary',
                ], $buttonOptions));

            // Modal dialog
            $content .= $this->render($this->modalView, ['widget' => $this]);
        } else {
            $content .= Html::beginTag('div', $this->options);
            $content .= Html::img($this->image, $this->imageOptions);
            $content .= Html::endTag('div');
        }

        $this->registerClientScript();

        return $content;
    }

    public function registerClientScript()
    {
        $view = $this->getView();
        // Register jQuery image cropping js and css files
        CropperAsset::register($view);
        // Additional plugin options
        $options = Json::encode($this->pluginOptions);

        $selector = "#$this->id .crop-image-container > img";

        if ($this->modal) {
            $ajaxOptions = Json::encode($this->ajaxOptions);
            $view->registerJs(<<<JS
(function() {

    var modalBox = $("#$this->id"),
        image = $("$selector"),
        cropBoxData,
        canvasData,
        cropUrl;

    modalBox.on("shown.bs.modal", function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        cropUrl = button.data('crop-url'); // Extract info from data-* attributes

        image.cropper($.extend({
            built: function () {
                // Strict mode: set crop box data first
                image.cropper('setCropBoxData', cropBoxData);
                image.cropper('setCanvasData', canvasData);
            },
            dragend: function() {
                cropBoxData = image.cropper('getCropBoxData');
                canvasData = image.cropper('getCanvasData');
            }
        }, $options));
    }).on('hidden.bs.modal', function () {
        cropBoxData = image.cropper('getCropBoxData');
        canvasData = image.cropper('getCanvasData');
        image.cropper('destroy');
    });

    $(document).on("click", "#$this->id .crop-submit", function(e) {
        e.preventDefault();

        $.ajax($.extend({
            method: "POST",
            url: cropUrl,
            data: image.cropper("getData"),
            dataType: "JSON",
            error: function() {
                alert("Error while cropping");
            }
        }, $ajaxOptions));

        modalBox.modal("hide");
    });

})();
JS
            );
        } else {
            $view->registerJs(";$(\"$selector\").cropper($options);");
        }
    }

}