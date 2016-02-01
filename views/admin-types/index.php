<?php

use yii\helpers\Html;
use app\base\widgets\GridView\AdminGridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\gallery\models\GalleryTypesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('gallery', 'Gallery types');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-types-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <? $this->beginContent('@app/modules/gallery/views/adminLayout.php')?>
<!--    <p>-->
<!--        --><?//= Html::a(Yii::t('gallery', 'Create Gallery Types'), ['update'], ['class' => 'btn btn-default']) ?>
<!--    </p>-->

    <?= AdminGridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => '#',
                'value' => 'id',
                'attribute' => 'id',
                'headerOptions' => [
                    'style' => 'width: 115px;',
                ],
                'filterType' => AdminGridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'pluginOptions' => [
                        'ajax' => [
                            'colAlias' => 'id',
                        ]
                    ],
                ]
            ],
            [
                'label' => Yii::t('gallery', 'Title'),
                'value' => function($model){
                    return \yii\bootstrap\Html::tag('i', '', ['class' => $model->icon]) . ' ' . $model->title;
                },
                'format' => 'raw',
                'attribute' => 'title',
                'filterType' => AdminGridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'pluginOptions' => [
                        'ajax' => [
                            'colAlias' => 'title',
                        ]
                    ],
                ]
            ],
//            'title',
//            'description:ntext',
//            'icon',
//            'created_at',
            // 'updated_at',

            [
                'class' => \app\base\widgets\ActionColumn\AdminActionColumn::className(),
                'viewOptions' => ['class' => 'btn btn-sm btn-default jsOpen'],
                'updateOptions' => ['class' => 'btn btn-sm btn-primary jsOpen', 'data' => [
                    'title' => Yii::t('gallery', 'Update'),
                    'type' => 'primary'
                ]],
            ],
        ],
    ]); ?>

    <? $this->endContent()?>

</div>
