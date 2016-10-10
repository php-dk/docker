<?php
namespace ToolsPhp\docker\containers;


use ToolsPhp\docker\core\ComposeManager;

class Container
{
    protected $fileName;

    /**
     * @var ComposeManager
     */
    protected $manager;
    
    /**
     * Container constructor.
     * @param $fileName
     */
    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
    }


    public static function new(string $fileName)
    {
        return new static($fileName);
    }

    public function getManager(): ComposeManager
    {
        if (!$this->manager) {
            $this->manager = new ComposeManager();
        }
        
        return $this->manager;
    }
    
    
    public function start()
    {
        return $this->getManager()->start([$this->fileName]);
    }

    public function stop()
    {
        $this->getManager()->stop([$this->fileName]);
    }

    public function restart()
    {
        $this->getManager()->restart([$this->fileName]);
    }

    public function remove()
    {
        $this->getManager()->remove([$this->fileName]);
    }

    public function kill()
    {
        $this->getManager()->kill([$this->fileName]);
    }

    public function build()
    {
        $this->getManager()->build([$this->fileName]);
    }

    public function getId(): string 
    {
        return $this->getManager()->getContainerId($this->fileName);
    }

    public function getIp(): string
    {
        return $this->getManager()->getIp($this->fileName);
    }

    public function getName(): string 
    {
        return $this->getManager()->ips([$this->fileName]);
    }

  
}