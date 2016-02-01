<?php

/**
 * @var $this yii\web\View
 * @var $content
 */

use yii\bootstrap\Nav;

?>


<?= Nav::widget([
    'activateParents' => true,
    'options' => [
        'class' => 'nav nav-pills',
    ],
    'items' => [
        ['label' => Yii::t('gallery', 'Gallery list'), 'url' => ['/gallery/admin/index']],
        ['label' => Yii::t('gallery', 'Gallery types list'), 'url' => ['/gallery/admin-types/index']],
        ['label' => Yii::t('gallery', 'Create'), 'url' => ['/gallery/admin/update'], 'items' => [
                ['label' => Yii::t('gallery', 'New gallery'), 'url' => ['/gallery/admin/update'], 'linkOptions' => [
                    'onClick' => '(new Modal()).displayAjaxContent($(this)); return false;',
                    'data' => [
                        'pjax' => 0,
                        'title' => Yii::t('gallery', 'New gallery'),
                        'type' => 'primary',
                    ],
                ]],
                ['label' => Yii::t('gallery', 'New gallery type'), 'url' => ['/gallery/admin-types/update'], 'linkOptions' => [
                    'onClick' => '(new Modal()).displayAjaxContent($(this)); return false;',
                    'data' => [
                        'pjax' => 0,
                        'title' => Yii::t('gallery', 'New gallery type'),
                        'type' => 'primary',
                    ],
                ]],
            ]
        ]
    ],
//    'items' => [
//        [
//            'label' => Yii::t('rbac', 'Roles'),
//            'url' => ['/rbac/role/index'],
//        ],
//        [
//            'label' => Yii::t('rbac', 'Permissions'),
//            'url' => ['/rbac/permission/index'],
//        ],
//        [
//            'label' => Yii::t('rbac', 'Create'),
//            'items' => [
//                [
//                    'label' => Yii::t('rbac', 'New role'),
//                    'url' => ['/rbac/role/create']
//                ],
//                [
//                    'label' => Yii::t('rbac', 'New permission'),
//                    'url' => ['/rbac/permission/create']
//                ]
//            ]
//        ]
//    ]
]) ?>

<div style="padding: 10px 0;">
    <?= $content?>
</div>