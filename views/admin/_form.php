<?php

use nagser\base\widgets\ActiveForm\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model nagser\gallery\models\GalleryRecord */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gallery-record-form">

    <?php $form = ActiveForm::begin([
        'id' => 'gallery-record-form',
        'full' => true,
        'options' => array('enctype' => 'multipart/form-data'),
    ]); ?>

    <?= Html::activeHiddenInput($model, 'module', ['value' => 'gallery'])?>
    <?= Html::activeHiddenInput($model, 'model', ['value' => 'GalleryRecord'])?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'enableAjaxValidation' => true]) ?>
    <?= $form->field($model, 'file')->widget(\kartik\widgets\FileInput::className(), [
        'options' => ['accept' => 'image/*',]
    ]) ?>

    <?= Html::submitButton($model->isNewRecord ? Yii::t('gallery', 'Create') : Yii::t('gallery', 'Update'), ['class' => 'btn btn-block']) ?>

    <?php ActiveForm::end(); ?>

</div>
