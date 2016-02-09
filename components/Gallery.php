<?php

namespace nagser\gallery\components;

use yii\base\Component;
use yii\base\UnknownClassException;
use yii\web\UploadedFile;

class Gallery extends Component {

    /**
     * @param $file \yii\web\UploadedFile
     * @throws UnknownClassException
     * @return void
     */
    public function upload($file){
        if($file instanceof UploadedFile){

        } else {
            throw new UnknownClassException();
        }
    }

}