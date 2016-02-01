<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $recordModel app\modules\gallery\models\GalleryTypes */

$this->title = Yii::t('gallery', 'Update {modelClass}: ', [
    'modelClass' => 'Gallery Types',
]) . ' ' . $recordModel->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('gallery', 'Gallery Types'), 'url' => ['index']];
$recordModel->isNewRecord or $this->params['breadcrumbs'][] = ['label' => $recordModel->title, 'url' => ['view', 'id' => $recordModel->id]];
$this->params['breadcrumbs'][] = $recordModel->isNewRecord ?  Yii::t('gallery', 'Create') : Yii::t('gallery', 'Update');
?>
<div class="gallery-types-update">

    <?= $this->render('_form', [
        'model' => $recordModel,
    ]) ?>

</div>
