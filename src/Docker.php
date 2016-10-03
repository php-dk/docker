<?php
namespace ToolsPhp\docker;


class Docker
{
    public function getService(): Service
    {
        return new Service($this);
    }

    
    public function getActiveContainerList()
    {
        return [];
    }

}