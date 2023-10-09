<?php

namespace Flysion\Value;

function value($value, &$context)
{
    if ($value instanceof Value) {
        return value($value->value($context), $context);
    }

    return $value;
}

function toString($value, $context)
{
    if($value instanceof Value) {
        return $value->toString($context);
    } else if (is_long($value) || is_integer($value) || is_float($value) || is_double($value)) {
        return strval($value);
    } else if (is_string($value)) {
        return '"' . $value . '"';
    } else if (is_object($value) && method_exists($value, '__toString')) {
        return '"' . strval($value) . '"';
    } else if (is_bool($value)) {
        return $value ? 'true' : 'false';
    } else if (is_null($value)) {
        return 'null';
    } else if (is_array($value)) {
        return '[' . implode(',', array_map(function ($v) use(&$context) {
                return toString($v, $context);
            }, $value)) . ']';
    } else if (is_iterable($value)) {
        return toString(iterator_to_array($value), $context);
    } else if (is_object($value)) {
        return '<' . get_class($value) . '>';
    } else {
        throw new \RuntimeException("未知的数据类型");
    }
}
