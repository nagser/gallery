<?php

namespace nagser\gallery;

use yii\base\BootstrapInterface;
use yii\helpers\ArrayHelper;

class Bootstrap implements BootstrapInterface {

    private $_modelMap = [
        'GalleryRecord' => 'nagser\gallery\models\GalleryRecord',
        'GallerySearch' => 'nagser\gallery\models\GallerySearch',
    ];

    public function bootstrap($app){
        /**@var Module $module**/
        $module = $app->getModule('gallery');
        $this->_modelMap = ArrayHelper::merge($this->_modelMap, $module->modelMap);
        foreach ($this->_modelMap as $name => $definition) {
            $class = "nagser\\gallery\\models\\" . $name;
            \Yii::$container->set($class, $definition);
            $modelName = is_array($definition) ? $definition['class'] : $definition;
            $module->modelMap[$name] = $modelName;
        }
        //Загрузка языков
        if (!isset($app->get('i18n')->translations['gallery'])) {
            $app->get('i18n')->translations['gallery'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@app/vendor/nagser/gallery/messages',
                'fileMap' => ['gallery' => 'gallery.php']
            ];
        }
    }

}