<?php

namespace Flysion\Value;

interface Value
{
    public function value(&$context);

    public function toString(&$context): string;
}
