<?php

namespace nagser\gallery;

class Module extends \nagser\base\Module {

    public $controllerNamespace = 'nagser\gallery\controllers';

    /**
     * Максимальные размеры кешируемых изображений
     * Задаётся в след. форматах: W x H, WxH, Wx, xH
     * */
    public $xlgSize = '3840x';
    public $lgSize = '1200x';
    public $mdSize = '992x';
    public $smSize = '768x';
    public $xsSize = '340x';

    /**
     * Качество изображений. Задаётся в процентах без %
     * */
    public $quality = 85;

    /**
     * Директория для загрузки изображений
     * */
    public $imagesPath = '@uploads/gallery/images';

    /**
     * Директория для загрузки остальных файлов
     * */
    public $othersPath = '@uploads/gallery/others';

    /**
     * Максимальный размер загружаемого файла в байтах
     * */
    public $maxSize = 128000000;

    /**
     * Разрешения файлов для создания preview
     * */
    public $extPreview = ['png', 'jpeg', 'jpg', 'gif'];

    /**
     * Типы файлов для создания preview
     * */
    public $extTypes = ['image/gif', 'image/jpeg', 'image/png'];

}