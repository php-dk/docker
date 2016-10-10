<?php
/**
 * Created by PhpStorm.
 * User: dima
 * Date: 10.10.16
 * Time: 23:37
 */

namespace ToolsPhp\docker\containers;


use PDO;

class DbContainer extends Container
{
    protected $option = [];
    
    protected $dns = '';
    protected $user;
    protected $password;
    protected $dbName;
    protected $driver;
    
    
    public function setParamConnect(string $driver,  string $dbName, string $user, string $password): self 
    {
        $this->driver = $driver;
        $this->dbName = $dbName;
        $this->user = $user;
        $this->password = $password;
        
        return $this;
    }


    public function getDns(): string 
    {
       return "{$this->driver}:host={$this->getIp()};dbname={$this->dbName};";
    }
    
    public function getPDO(): PDO 
    {
        return new PDO($this->getDns(), $this->user, $this->password);
    }

}