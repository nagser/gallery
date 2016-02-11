<?php

namespace nagser\gallery\components;

use yii\base\Component;
use yii\base\ErrorException;
use yii\base\UnknownClassException;
use yii\imagine\Image;
use yii\web\UploadedFile;
use nagser\base\models\Model;

/**
 * @property \nagser\gallery\Module $gallery;
 * */
class Gallery extends Component {

    public function getGallery() {
        return \Yii::$app->getModule('gallery');
    }

    /**
     * Загрузка файла в галерею
     * @param $model Model
     * @param $name string Название поля с файлом
     * @throws ErrorException
     */
    public function upload($model, $name = 'file'){
        $file = UploadedFile::getInstance($model, $name);
        if($file->size > $this->gallery->maxSize) {
            throw new ErrorException(\Yii::t('gallery', 'Maximum file size {size}MB', ['size' => $this->gallery->maxSize / 1024 / 1024]));
        }


        debug($file);
//        $file->saveAs(\Yii::$app->getModule('gallery')->othersPath . '/' . $file->baseName . '.' . $file->extension);
    }

    /**
     * Переименовать файл перед загрузкой
     * @param UploadedFile $file
     * @return string
     * */
    public function rename($file){
        $file->name = uniqid();
        return $file;
    }

    /**
     * Сохранение файлов в папках согласно типу
     * @param UploadedFile $file
     * @return UploadedFile $file
     * */
    public function save($file){
        if(in_array($file->extension, $this->gallery->extPreview) and in_array($file->type, $this->gallery->extTypes)){
            $this->uploadImage();
        } else {
        }
    }

    /**
     * Сгенерировать и сохранить превьюшки
     * */
    public function uploadImage(){

    }

}