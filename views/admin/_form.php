<?php

use app\base\widgets\Select2\AdminSelect2;
use app\modules\gallery\models\GalleryTypes;
use app\modules\pages\widgets\CKEditorWidget\CKEditorWidget;
use dosamigos\fileupload\FileUpload;
use dosamigos\fileupload\FileUploadUI;
use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model app\modules\gallery\models\GalleryRecord */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gallery-record-form">

    <?php $form = ActiveForm::begin([
//        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <? if($model->isNewRecord):?>
        <?= $form->field($model, 'type')->widget(AdminSelect2::className(), ['data' => (new GalleryTypes())->asList()])?>
    <? endif?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'description')->textarea(['rows' => 6])->widget(CKEditorWidget::className()) ?>
    <?= $form->field($model, 'content')->widget(\app\modules\gallery\widgets\FileUploadWidget\FileUploadWidget::className(), [])?>
    <?= $form->field($model, 'author_id')->widget(AdminSelect2::className(), [
        'pluginOptions' => [
            'allowClear' => true,
            'minimumInputLength' => 1,
            'ajax' => [
                'url' => \yii\helpers\Url::to(['/user/admin/ajax-search']),
                'dataType' => 'json',
                'data' => new JsExpression('function(params) { return {search:params.term, colAlias: "profile.name"}; }'),
            ],
            'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
            'templateResult' => new JsExpression('function(item) { return item.text; }'),
            'templateSelection' => new JsExpression('function (item) { return item.text; }'),
        ]
    ]) ?>
    <?= $form->field($model, 'position')->textInput() ?>
    <?= $form->field($model, 'direct_access')->checkbox() ?>
    <?= $form->field($model, 'is_main')->checkbox() ?>

    <?= Html::submitButton($model->isNewRecord ? Yii::t('gallery', 'Create') : Yii::t('gallery', 'Update'), ['class' => 'btn btn-block btn-primary']) ?>

    <?php ActiveForm::end(); ?>

</div>
