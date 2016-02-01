<?php

namespace app\modules\gallery\controllers;

use app\modules\gallery\models\GalleryTypes;
use app\modules\gallery\models\GalleryTypesSearch;
use Yii;
use app\base\CustomAdminController;

/**
 * AdminTypesController implements the CRUD actions for GalleryTypes model.
 */
class AdminTypesController extends CustomAdminController
{

    /**
     * @return string
     * */
    protected function getRecordModel(){
        return GalleryTypes::className();
    }

    /**
     * @return string
     */
    protected function getSearchModel(){
        return GalleryTypesSearch::className();
    }

}
