<?php

namespace Flysion\Value;

class _AND implements Value
{
    private $conditions;

    public function __construct($conditions)
    {
        $this->conditions = $conditions;
    }

    public function value(&$context): bool
    {
        foreach ($this->conditions as $condition) {
            if (!value($condition, $context)) {
                return false;
            }
        }
        return true;
    }

    public function toString(&$context): string
    {
        return '(' . implode(' and ', array_map(function ($v) use(&$context) {
                return toString($v, $context);
            }, $this->conditions)) . ')';
    }
}
