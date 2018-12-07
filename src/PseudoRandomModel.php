<?php

namespace Waygou\Helpers;

use \Exception;

class PseudoRandomModel
{
    function __construct()
    {
    }

    static function new(...$args)
    {
        return new self(...$args);
    }

    function with($model)
    {
        if (!class_exists($model)) {
            throw new Exception('Model class don\'t exist! Please check the model namespace/class name.');
        }

        $this->model = $model;
        return $this;
    }

    function min($min)
    {
        $this->min = $min;
        return $this;
    }

    function except(array $values)
    {
        $this->except = $values;
        return $this;
    }

    function max($max)
    {
        $this->max = $max;
        return $this;
    }

    function random()
    {
        $model = app()->make($this->model);

        $pk = $model->getKeyName();

        $builder = $model->query();

        $conditions = [];

        if (isset($this->min)) {
            $conditions[] = [$pk, '>=', $this->min];
        }

        if (isset($this->max)) {
            $conditions[] = [$pk, '<=', $this->max];
        }

        $builder = $builder->where($conditions);

        if (isset($this->except)) {
            $builder = $builder->whereNotIn($pk, $this->except);
        }

        return $builder->orderByRaw('RAND()')->first();
    }
}
