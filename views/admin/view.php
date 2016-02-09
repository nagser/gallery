<?php

use nagser\base\widgets\DetailView\DetailView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model nagser\gallery\models\GalleryRecord */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('gallery', 'Gallery list'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-record-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'type',
            'title',
            'file',
            [
                'attribute' => 'author',
                'value' => Html::a($model->author->profile->name, ['/user/admin/view', 'id' => $model->author->id]),
                'label' => Yii::t('gallery', 'Author'),
                'format' => 'html'
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
