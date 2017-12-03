<?php
Yii::setAlias('@tests', dirname(__DIR__) . '/tests');
$config = [
    'id' => 'app-console',
    'bootstrap' => ['gii'],
    'controllerNamespace' => 'app\commands',
    'modules' => [
        'gii' => 'yii\gii\Module',
    ],
];


return $config;
