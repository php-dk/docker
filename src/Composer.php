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
    protected $class = Container::class;
    
    public function up(string $fileName): Container 
    {
        return call_user_func_array([$this->class, 'new'], [$fileName]);
    }


    public function build()
    {
        
    }

    public function setPrototype(string $class): self
    {
        $this->class = $class;

        return $this;
    }


}