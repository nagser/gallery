<?php

use yii\helpers\Html;
use app\base\widgets\DetailView\AdminDetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\gallery\models\GalleryRecord */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('gallery', 'Gallery Records'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-record-view">

<!--
    <p>
        <?= Html::a(Yii::t('gallery', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('gallery', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger jsDialog',
            'data' => [
			    'data-modal-type' => 'confirm',
			    'data-modal-class' => 'danger',
                'data-message' => Yii::t('yii', 'Are you sure you want to delete this item?')
            ],
        ]) ?>
    </p>
-->
    <?= AdminDetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'module',
            'model',
            'model_id',
            'type',
            'title',
            'description:ntext',
            'content:ntext',
            'direct_access',
            'author_id',
            'is_main',
            'position',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
