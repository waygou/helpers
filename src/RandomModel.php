<?php

namespace Waygou\Helpers;

class RandomModel
{
    public static function __callStatic($method, $args)
    {
        return PseudoRandomModel::new()->{$method}(...$args);
    }
}
