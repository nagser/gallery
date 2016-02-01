<?php

use yii\helpers\Html;
use app\base\widgets\DetailView\AdminDetailView;

/* @var $this yii\web\View */
/* @var $recordModel app\modules\gallery\models\GalleryTypes */

$this->title = $recordModel->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('gallery', 'Gallery Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-types-view">

<!--
    <p>
<!--        --><?//= Html::a(Yii::t('gallery', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--        --><?//= Html::a(Yii::t('gallery', 'Delete'), ['delete', 'id' => $model->id], [
//            'class' => 'btn btn-danger jsDialog',
//            'data' => [
//			    'data-modal-type' => 'confirm',
//			    'data-modal-class' => 'danger',
//                'data-message' => Yii::t('yii', 'Are you sure you want to delete this item?')
//            ],
//        ]) ?>
<!--    </p>-->
    <?= AdminDetailView::widget([
        'model' => $recordModel,
        'attributes' => [
            'id',
            'title',
            'description:raw',
            [
                'attribute' => 'icon',
                'label' => Yii::t('gallery', 'Icon'),
                'value' => $recordModel->icon ? Html::tag('i', '', ['class' => $recordModel->icon]) : NULL,
                'format' => 'raw'
            ],
            [
                'attribute' => 'created_at',
                'label' => Yii::t('gallery', 'Created'),
                'format' => 'datetime'
            ],
            [
                'attribute' => 'updated_at',
                'label' => Yii::t('gallery', 'Updated'),
                'format' => 'datetime'
            ],
        ],
    ]) ?>

</div>
