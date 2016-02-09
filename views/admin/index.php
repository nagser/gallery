<?php

use nagser\base\widgets\GridView\GridView;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $modelSearch nagser\logger\models\LoggerSearch */
/* @var $model nagser\logger\models\LoggerRecord */

$this->title = Yii::t('logger', 'Logs list');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="logger-record-index">
	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $modelSearch,
		'columns' => [
			[
				'label' => Yii::t('logger', 'Id'),
				'value' => 'id',
				'attribute' => 'id',
				'headerOptions' => [
					'style' => 'width: 115px;',
				],
				'filterType' => GridView::FILTER_SELECT2,
				'filterWidgetOptions' => [
					'pluginOptions' => [
						'ajax' => [
							'colAlias' => 'id',
						]
					],
				]
			],
			[
				'label' => Yii::t('logger', 'Category'),
				'value' => 'category',
				'attribute' => 'category',
				'filterType' => GridView::FILTER_SELECT2,
				'filterWidgetOptions' => [
					'pluginOptions' => [
						'ajax' => [
							'colAlias' => 'category'
						]
					],
				]
			],
			[
				'label' => Yii::t('logger', 'Level'),
				'value' => 'level',
				'attribute' => 'level',
				'headerOptions' => [
					'style' => 'width: 115px;',
				],
				'filterType' => GridView::FILTER_SELECT2,
				'filterWidgetOptions' => [
					'pluginOptions' => [
						'ajax' => [
							'colAlias' => 'level',
						]
					],
				]
			],
			[
				'class' => \nagser\base\widgets\ActionColumn\ActionColumn::className(),
				'template' => '{view} {delete}',
				'viewOptions' => ['class' => 'btn btn-sm btn-default jsOpen']
			],
		],
	]); ?>
</div>
