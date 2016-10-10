<?php

use ToolsPhp\docker\Composer;
use ToolsPhp\docker\containers\DbContainer;
use ToolsPhp\docker\Docker;

include __DIR__ . "/../vendor/autoload.php";

$docker = Docker::getInstance();
$docker->factory([
    'postgres' => function(Composer $composer) {
        $composer->setPrototype(DbContainer::class);
        /** @var DbContainer $container */
        $container =  $composer->up(__DIR__ . '/docker-composer.yml');
        $container->setParamConnect('pgsql', 'postgres','postgres','postgres');

        return $container;
    }
]);

/** @var DbContainer $postgres */
$postgres = $docker->get('postgres');
$postgres->start();

$pdo = $postgres->getPDO();
