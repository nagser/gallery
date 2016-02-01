<?
/**
 * @var $model \app\modules\gallery\models\GalleryRecord
 * @var $attribute
 * */
?>
<? if($model->$attribute):?>
    <img src="<?= $model->$attribute ?>" alt=""/>
<? else:?>
    <?= \yii\bootstrap\Html::a('Загрузить файл', ['/gallery/admin/upload', 'id' => $model->id], [
        'class' => 'btn btn-sm btn-danger btn-block jsOpen',
        'id' => 'id-'.rand(999, 99999),
        'data' => [
            'title' => 'Загрузка файла',
            'type' => 'danger',
            'size' => 'modal-sm',
    ]])?>
<? endif?>