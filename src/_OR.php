<?php

namespace Flysion\Value;

class _OR implements Value
{
    private $conditions;

    public function __construct($conditions)
    {
        $this->conditions = $conditions;
    }

    public function value(&$context)
    {
        foreach ($this->conditions as $condition) {
            if (value($condition, $context)) {
                return true;
            }
        }
        return false;
    }

    public function toString(&$context): string
    {
        return '(' . implode(' or ', array_map(function ($v) use(&$context) {
                return toString($v, $context);
            }, $this->conditions)) . ')';
    }
}
