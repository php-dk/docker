<?php
/**
 * Created by PhpStorm.
 * User: dima
 * Date: 03.10.16
 * Time: 19:53
 */

namespace ToolsPhp\docker;


class Service
{
    public function start()
    {
        exec('service docker start');
    }

    public function stop()
    {
        exec('service docker stop');
    }

    public function restart()
    {
        exec('service docker restart');
    }

}