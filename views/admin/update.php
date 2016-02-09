<?php


/* @var $this yii\web\View */
/* @var $model nagser\gallery\models\GalleryRecord */

$this->title = Yii::t('gallery', $model->isNewRecord ? 'Upload file' : 'Update file');
$this->params['breadcrumbs'][] = ['label' => Yii::t('gallery', 'Gallery list'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-record-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
