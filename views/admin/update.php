<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $recordModel app\modules\gallery\models\GalleryRecord */

$this->title = Yii::t('gallery', 'Update {modelClass}: ', [
    'modelClass' => 'Gallery Record',
]) . ' ' . $recordModel->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('gallery', 'Gallery Records'), 'url' => ['index']];
$recordModel->isNewRecord or $this->params['breadcrumbs'][] = ['label' => $recordModel->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $recordModel->isNewRecord ?  Yii::t('gallery', 'Create') : Yii::t('gallery', 'Update');
?>
<div class="gallery-record-update">

    <?= $this->render('_form', [
        'model' => $recordModel,
    ]) ?>

</div>
