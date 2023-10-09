<?php

namespace Flysion\Value;

class ContextValue implements Value
{
    private $key;
    private $default;

    public function __construct($key, $default = null)
    {
        $this->key = $key;
        $this->default = $default;
    }

    public function value(&$context)
    {
        $key = value($this->key, $context);
        if ($key === null) {
            return $this->default;
        }

        $keys = explode('.', $key);
        $value = &$context;
        foreach ($keys as $key) {
            if (!is_array($value) || !array_key_exists($key, $value)) {
                $value = $this->default;
                break;
            }

            $value = &$value[$key];
            $value2 = value($value, $context);
            if ($value instanceof Cacheable) {
                $value = $value2;
            } else {
                $value = &$value2;
            }
        }

        return $value;
    }

    public function toString(&$context): string
    {
        return '`' . value($this->key, $context) . '`';
    }
}
