<?php
namespace ToolsPhp\docker\exception;


class Exception extends \Exception
{
    public static function new(string $message, array $params = []): self 
    {
        return new static(TString::new($message)->format($params));
    }

}