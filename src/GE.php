<?php

namespace Flysion\Value;

class GE implements Value
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
        return value($this->left, $context) >= value($this->right, $context);
    }

    public function toString(&$context): string
    {
        return toString($this->left, $context) . ' >= ' . toString($this->right, $context);
    }
}
