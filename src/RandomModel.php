<?php

namespace Waygou\Helpers;

use Waygou\Helpers\PseudoRandomModel;

class RandomModel
{
    static function __callStatic($method, $args)
    {
        return PseudoRandomModel::new()->{$method}(...$args);
    }
}
