<?php

namespace Flysion\Value;

class _NOT implements Value
{
    private $condition;

    public function __construct($condition)
    {
        $this->condition = $condition;
    }

    public function value(&$context)
    {
        return !value($this->condition, $context);
    }

    public function toString(&$context): string
    {
        return 'not (' . toString($this->condition, $context) . ')';
    }
}
