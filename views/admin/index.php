<?php

use yii\helpers\Html;
use app\base\widgets\GridView\AdminGridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\gallery\models\GallerySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('gallery', 'Gallery list');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-record-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <? $this->beginContent('@app/modules/gallery/views/adminLayout.php')?>

<!--    <p>-->
<!--        --><?//= Html::a(Yii::t('gallery', 'Create Gallery Record'), ['update'], ['class' => 'btn btn-default']) ?>
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
                'value' => 'title',
                'attribute' => 'title',
                'headerOptions' => [
                    'style' => 'width: 115px;',
                ],
                'filterType' => AdminGridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'pluginOptions' => [
                        'ajax' => [
                            'colAlias' => 'title',
                        ]
                    ],
                ]
            ],
            [
                'label' => Yii::t('gallery', 'Type'),
                'value' => 'type',
                'attribute' => 'type',
                'headerOptions' => [
                    'style' => 'width: 115px;',
                ],
                'filterType' => AdminGridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'pluginOptions' => [
                        'ajax' => [
                            'colAlias' => 'type',
                        ]
                    ],
                ]
            ],
            [
                'label' => Yii::t('gallery', 'Author'),
                'value' => 'author_id',
                'attribute' => 'author_id',
                'headerOptions' => [
                    'style' => 'width: 115px;',
                ],
                'filterType' => AdminGridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'pluginOptions' => [
                        'ajax' => [
                            'colAlias' => 'author_id',
                        ]
                    ],
                ]
            ],
            [
                'label' => Yii::t('gallery', 'Updated'),
                'value' => 'updated_at',
                'attribute' => 'updated_at',
                'headerOptions' => [
                    'style' => 'width: 115px;',
                ],
                'filterType' => AdminGridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'pluginOptions' => [
                        'ajax' => [
                            'colAlias' => 'updated_at',
                        ]
                    ],
                ]
            ],
            [
                'label' => Yii::t('gallery', 'Created'),
                'value' => 'created_at',
                'attribute' => 'created_at',
                'headerOptions' => [
                    'style' => 'width: 115px;',
                ],
                'filterType' => AdminGridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'pluginOptions' => [
                        'ajax' => [
                            'colAlias' => 'created_at',
                        ]
                    ],
                ]
            ],
            ['class' => \app\base\widgets\ActionColumn\AdminActionColumn::className()],
        ],
    ]); ?>

    <? $this->endContent()?>

</div>
