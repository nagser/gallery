<?php

namespace app\modules\gallery\controllers;

use Yii;
use app\base\CustomAdminController;
use app\modules\gallery\models\GalleryRecord;
use yii\helpers\Url;
use yii\web\Response;

/**
 * AdminController implements the CRUD actions for GalleryRecord model.
 */
class AdminController extends CustomAdminController
{

    public function actionUpload($id = null)
    {
        /** @var GalleryRecord $recordModel * */
        if ($id) {
            $recordModel = $this->findRecordModel($id);
        } else {
            $recordModel = new $this->recordModel;
        }
        $recordModel->scenario = 'upload';
        if (Yii::$app->request->post()) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'files' => [
                    [
                        'url' => "http://yii.scriptogenius.com/themes/absoluteadmin/preview.png",
                        'thumbnail_url' => "http://yii.scriptogenius.com/themes/absoluteadmin/preview.png",
                        'name' => "preview.png",
                        'type' => "image/png",
                        'size' => 46353,
                        'delete_url' => Url::to(['delete-file']),
                        'delete_type' => "DELETE"
                    ],
                ]
            ];
        } else {
            if (Yii::$app->request->isAjax) {
                return $this->renderAjax('upload', [
                    'recordModel' => $recordModel,
                ]);
            } else {
                return $this->render('upload', [
                    'recordModel' => $recordModel,
                ]);
            }
        }
//        if ($recordModel->load(Yii::$app->request->post()) and $recordModel->save()) {
//            if (Yii::$app->request->isAjax) {
//                Yii::$app->response->format = Response::FORMAT_JSON;
//                return [
//                    'id' => $recordModel->id,
//                    'type' => $recordModel->type,
//                    'author_id' => $recordModel->author_id,
//                    'content' => $recordModel->content,
//                ];
//            } else {
//                $this->redirect(['update', 'id' => $recordModel->id]);
//            }
//        } else {
//            if (Yii::$app->request->isAjax) {
//                return $this->renderAjax('upload', [
//                    'recordModel' => $recordModel,
//                ]);
//            } else {
//                return $this->render('upload', [
//                    'recordModel' => $recordModel,
//                ]);
//            }
//        }
    }

}
