<?
/**
 * @var $model demi\image\ImageUploaderBehavior|yii\db\ActiveRecord
 * @var $behavior demi\image\ImageUploaderBehavior
 * @var $widgetId
 * @var $imageSrc
 * @var $deleteUrl
 * @var $cropUrl
 * @var $cropPluginOptions
 * */
use app\modules\gallery\components\cropper\Cropper;
use demi\image\ImageUploaderBehavior;
use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\web\JsExpression;

$image = $model->getAttribute($behavior->getImageConfigParam('imageAttribute'));
?>

<? if(!empty($image) and !$model->isNewRecord):?>
    <div id="<?= $widgetId?>" class="row">
        <div class="col-md-12">
            <?= Html::img($imageSrc, ['class' => 'pull-left uploaded-image-preview'])?>
        </div>
    </div>
    <div class="btn-group">
        <?= Html::a(Yii::t('gallery', 'Delete'), $deleteUrl, [

//            'onclick' => new JsExpression('
//                        if (!confirm("Вы действительно хотите удалить изображение?")) {
//                            return false;
//                        }
//                        $.ajax({
//                            type: "post",
//                            cache: false,
//                            url: "' . Url::to($deleteUrl) . '",
//                            success: function() {
//                                $("#' . $widgetId . '").remove();
//                            }
//                        });
//                        return false;
//                    '),
            'data' => [
                'modal-type' => 'confirm',
                'modal-class' => 'danger',
                'modal-message' => 'Удалить?',
                'modal-container-for-delete' => $widgetId,
            ],
            'class' => 'btn btn-danger jsDialog',
        ])?>
    </div>
    <? if (!empty($cropUrl)): ?>
        <?= Cropper::widget([
            'modal' => true,
            'cropUrl' => $cropUrl,
            'image' => ImageUploaderBehavior::addPostfixToFile($model->getImageSrc(), '_original'),
            'aspectRatio' => $behavior->getImageConfigParam('aspectRatio'),
            'pluginOptions' => $cropPluginOptions,
            'ajaxOptions' => [
                'success' => new JsExpression(<<<JS
                    function(data) {
                        // Refresh image src value to show new cropped image
                        var img = $("#$widgetId img.uploaded-image-preview");
                        img.attr("src", img.attr("src").replace(/\?.*/, '') + "?" + new Date().getTime());
                    }
JS
                ),
            ],
        ]); ?>
    <? endif ?>
<? endif?>

<?= Html::activeFileInput($model, $behavior->getImageConfigParam('imageAttribute'))?>
<div class="hint-block">
    <?= Yii::t('gallery', 'Supported formats: {formats}.', ['formats' => $behavior->getImageConfigParam('fileTypes')])?>
    <?= Yii::t('gallery', 'Maximum file size: {size}MB.', ['size' => ceil($behavior->getImageConfigParam('maxFileSize') / 1024 / 1024)])?>
</div>