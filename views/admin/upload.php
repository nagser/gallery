<?php

use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model nagser\gallery\models\GalleryRecord */

$formId = 'gallery-upload-form';
?>


<div class="gallery-record-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'id' => $formId,
            'enctype' => 'multipart/form-data'
        ]
    ]); ?>

    <?= \yii\bootstrap\Progress::widget([
        'percent' => '0',
        'label' => Yii::t('gallery', 'Loading...'),
        'options' => ['style' => 'display: none;'],
        'barOptions' => ['class' => 'progress-bar-danger', 'id' => 'fileUploadWidgetProgress']
    ])?>

    <?= $form->field($model, 'content')->widget(\nagser\gallery\widgets\FileUploadWidget\FileUploadWidgetInput::className(), [
        'options' => [
            'formId' => $formId,
            'mode' => 'single',
            'pluginOptions' => [
                'done' => new \yii\web\JsExpression("
                    function(e, data){
                       upload.done(e,data)
                    }
                "),
                'stop' => new \yii\web\JsExpression("
                    function(e, data){
                       upload.stop(e,data)
                    }
                "),
                'progressall' => new \yii\web\JsExpression("
                    function (e, data) {
                        upload.progressall(e, data)
                    }
                "),
                'add' => new \yii\web\JsExpression("
                    function(e, data) {
                        upload.add(e, data)
                    }
                "),
                'submit' => new \yii\web\JsExpression("
                    function(e, data) {
                        upload.submit(e, data)
                    }
                "),
            ],
        ]
    ])?>

    <?php ActiveForm::end(); ?>

</div>
