<?php

use nagser\base\widgets\DetailView\DetailView;

/* @var $this yii\web\View */
/* @var $model nagser\logger\models\LoggerRecord */

$this->title = ucfirst($model->category);
$this->params['breadcrumbs'][] = ['label' => Yii::t('logger', 'Logs list'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="logger-model-view">

	<?= DetailView::widget([
		'model' => $model,
		'attributes' => [
            [
                'label' => Yii::t('logger', 'Id'),
                'attribute' => 'id',
            ],
            [
                'label' => Yii::t('logger', 'Category'),
                'attribute' => 'category',
            ],
            [
                'label' => Yii::t('logger', 'Level'),
                'attribute' => 'level',
            ],
            [
                'label' => Yii::t('logger', 'Log time'),
                'attribute' => 'log_time',
                'format' => 'datetime',
            ],
            [
                'label' => Yii::t('logger', 'Prefix'),
                'attribute' => 'prefix',
            ],
            [
                'label' => Yii::t('logger', 'Message'),
                'attribute' => 'message',
				'valueColOptions' => ['style' => 'word-break: break-all;'],
				'format' => 'ntext'
            ],
		],
	]) ?>

</div>
