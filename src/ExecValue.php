<?php

namespace Flysion\Value;

class ExecValue implements Value, Cacheable
{
    private $func;

    public function __construct($func)
    {
        $this->func = $func;
    }

    public function value(&$context)
    {
        return call_user_func_array($this->func, [&$context]);
    }

    public function toString(&$context): string
    {
        return '<call>';
    }
}
