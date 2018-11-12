<?php

function bool_str($value)
{
    if (is_bool($value)) {
        return $value === true ? 'true' : 'false';
    }
}
