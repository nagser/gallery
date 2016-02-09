<?php


/* @var $this yii\web\View */
use nagser\base\widgets\GridView\GridView;

/* @var $modelSearch nagser\gallery\models\GallerySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('gallery', 'Gallery list');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-record-index">

    <p style="margin-bottom: 10px;"><?= \yii\bootstrap\Html::a(Yii::t('gallery', 'Upload file'), ['update'], ['class' => 'btn btn-default'])?></p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $modelSearch,
        'columns' => [
            [
                'label' => '#',
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
                'label' => Yii::t('gallery', 'Title'),
                'value' => 'title',
                'attribute' => 'title',
                'headerOptions' => [
                    'style' => 'width: 115px;',
                ],
                'filterType' => GridView::FILTER_SELECT2,
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
                'filterType' => GridView::FILTER_SELECT2,
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
                'filterType' => GridView::FILTER_SELECT2,
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
                'filterType' => GridView::FILTER_SELECT2,
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
                'filterType' => GridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'pluginOptions' => [
                        'ajax' => [
                            'colAlias' => 'created_at',
                        ]
                    ],
                ]
            ],
            ['class' => \nagser\base\widgets\ActionColumn\ActionColumn::className()],
        ],
    ]); ?>

</div>
