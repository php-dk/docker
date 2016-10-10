<?php
namespace ToolsPhp\docker\exception;

use Types\TString;

class Exception extends \Exception
{
    public static function new(string $message, array $params = []): self 
    {
        return new static(TString::new($message)->format($params));
    }

}