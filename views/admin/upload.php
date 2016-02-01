<?php

use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $recordModel app\modules\gallery\models\GalleryRecord */

$formId = 'gallery-record-form';
?>


<div class="gallery-record-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'id' => $formId,
            'enctype' => 'multipart/form-data'
        ]
    ]); ?>

    <?= $form->field($recordModel, 'content')->widget(\app\modules\gallery\widgets\FileUploadWidget\FileUploadWidgetInput::className(), [
        'options' => [
            'formId' => $formId,
            'mode' => 'single',
            'pluginOptions' => [
                'done' => new \yii\web\JsExpression("
                    function(e, data){
                        var file;
                        var activeModal = modalsStorage.getActiveModalFromStorage();
                        if(data.result.files){
                            var filesContainer = '';
                            var template = $('#files-upload-row').html();
                            var templateContainer = $('#files-upload-container').html();
                            $.each(data.result.files, function (index, file) {
                                filesContainer += Mustache.render(template, file);
                            });
                            $(templateContainer).html(filesContainer).insertBefore('#' + activeModal.buttonId);
                            //$().appendTo(templateContainer).insertBefore('#' + activeModal.buttonId);
                            $('#' + activeModal.modalId).modal('hide');
                        }
                    }
                ")
            ],
        ]
    ])?>

    <?php ActiveForm::end(); ?>

</div>
