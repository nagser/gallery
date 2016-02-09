<?php

namespace nagser\logger;

use yii\base\BootstrapInterface;
use yii\helpers\ArrayHelper;

class Bootstrap implements BootstrapInterface {

    private $_modelMap = [
        'LoggerModel' => 'nagser\logger\models\LoggerRecord',
        'LoggerSearch' => 'nagser\logger\models\LoggerSearch',
    ];

    public function bootstrap($app){
        /**@var Module $module**/
        $module = $app->getModule('logger');
        $this->_modelMap = ArrayHelper::merge($this->_modelMap, $module->modelMap);
        foreach ($this->_modelMap as $name => $definition) {
            $class = "nagser\\logger\\models\\" . $name;
            \Yii::$container->set($class, $definition);
            $modelName = is_array($definition) ? $definition['class'] : $definition;
            $module->modelMap[$name] = $modelName;
        }
        //Загрузка языков
        if (!isset($app->get('i18n')->translations['logger'])) {
            $app->get('i18n')->translations['logger'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@app/vendor/nagser/logger/messages',
                'fileMap' => ['logger' => 'logger.php']
            ];
        }
    }

}