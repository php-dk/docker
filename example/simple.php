<?php

use ToolsPhp\docker\Composer;
use ToolsPhp\docker\Docker;

include __DIR__ . "/../vendor/autoload.php";

$docker = Docker::getInstance();
$docker->factory([
    'postgres' => function(Composer $composer) {
        return $composer->up(__DIR__ . '/docker-composer.yml');
    }
]);

$postgres = $docker->get('postgres');
$containerName = $postgres->getName();
