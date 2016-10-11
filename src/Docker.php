<?php
namespace ToolsPhp\docker;


use ToolsPhp\docker\containers\Container;
use ToolsPhp\docker\exception\Exception;

class Docker
{
    /**
     * @var array
     */
    protected $containers;
    
    public static function getInstance(): self 
    {
        static $f;
        
        return $f = $f ?: new static;
    }
    
    public function getService(): Service
    {
        return new Service($this);
    }

    protected function buildComposer(): Composer
    {
        return new Composer();
    }

    public function factory(array $data): self 
    {
        $this->containers = $data;
        
        return $this;
    }


    public function get(string $name): Container
    {
        if (!isset($this->containers[$name])) {
            throw Exception::new('Container {0} not found', [$name]);
        }
        
        $factory = $this->containers[$name];
        if (is_callable($factory)) {
            $container =  $factory($this->buildComposer());
            if (! $container instanceof Container) {
                throw Exception::new('Factory return Container');
            }

            return $container;
        }
        
        throw Exception::new('Error init factory');
    }
}