<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\gallery\models\GalleryTypes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gallery-types-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6])->widget(\app\modules\pages\widgets\CKEditorWidget\CKEditorWidget::className()) ?>

    <?= $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>

    <!--    --><?//= $form->field($model, 'created_at')->textInput() ?>

    <!--    --><?//= $form->field($model, 'updated_at')->textInput() ?>


    <?= Html::submitButton($model->isNewRecord ? Yii::t('gallery', 'Create') : Yii::t('gallery', 'Update'), ['class' => 'btn btn-block btn-primary']) ?>

    <?php ActiveForm::end(); ?>

</div>
