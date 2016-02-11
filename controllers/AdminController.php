<?php

namespace nagser\gallery\controllers;

use kartik\form\ActiveForm;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * AdminController implements the CRUD actions for GalleryRecord model.
 * @property \nagser\gallery\models\GalleryRecord $model
 */
class AdminController extends \nagser\base\controllers\AdminController
{

    /**
     * Геттер для модели
     * */
    protected function getModel()
    {
        return ArrayHelper::getValue($this->module->modelMap, 'GalleryRecord');
    }

    /**
     * Геттер для модели поиска
     * */
    protected function getModelSearch()
    {
        return ArrayHelper::getValue($this->module->modelMap, 'GallerySearch');
    }

    /**
     * @inheritdoc
     * */
    public function actionUpdate($id = null)
    {
        if ($id) {
            $modelObject = $this->findRecordModel($id);
        } else {
            $modelObject = Yii::createObject($this->model);
        }
        /** @var \nagser\gallery\models\GalleryRecord $modelObject * */
        if (\Yii::$app->request->isAjax) {
            if ($modelObject->load(\Yii::$app->request->post())) {
                \Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($modelObject);
            } else {
                return $this->renderAjax('update', [
                    'model' => $modelObject,
                ]);
            }
        } else {
            if (Yii::$app->request->isPost) {
                $modelObject->file = Yii::$app->gallery->upload($modelObject);
                if ($modelObject->upload() and $modelObject->scenario = 'save' and $modelObject->load(\Yii::$app->request->post()) and $modelObject->save()) {
                    $this->redirect(Url::to(['view', 'id' => $modelObject->id]));
                }
            }
            return $this->render('update', [
                'model' => $modelObject
            ]);
        }
    }

}
