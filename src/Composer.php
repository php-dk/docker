<?php
/**
 * Created by PhpStorm.
 * User: dima
 * Date: 10.10.16
 * Time: 22:27
 */

namespace ToolsPhp\docker;


use DockerCompose\Manager\ComposeManager;
use ToolsPhp\docker\containers\Container;

class Composer
{
    public function up(string $fileName): Container 
    {
        return Container::new($fileName);
    }


    public function build()
    {
        
    }
    
    
}