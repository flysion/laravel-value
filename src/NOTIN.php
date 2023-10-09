<?php

namespace Flysion\Value;

class NOTIN implements Value
{
    private $left;
    private $right;

    public function __construct($left, $right)
    {
        $this->left = $left;
        $this->right = $right;
    }

    public function value(&$context): bool
    {
        return !in_array(value($this->left, $context), value(array_map(function ($v) use (&$context) {
            return value($v, $context);
        }, $this->right), $context));
    }

    public function toString(&$context): string
    {
        return toString($this->left, $context) . ' not in ' . toString($this->right, $context);
    }
}
