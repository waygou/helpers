<?php

namespace Waygou\Helpers\Traits;

/**
 * Allows the Model to use the object method ->save() in a collection of arrays.
 * This will allow the mutators and Eloquent events to be called.
 */
trait CanSaveMany
{
    /**
     * Saves many Models.
     *
     * @param array $datasets The data array of arrays.
     *
     * @return array The created models array.
     */
    public static function saveMany($datasets)
    {
        $models = [];

        if (!is_array($datasets)) {
            $datasets = array($datasets);
        }

        foreach ($datasets as $dataset) {
            $class = get_called_class();
            $model = new $class();

            // Assign attributes.
            foreach ($dataset as $attribute => $value) {
                $model->{$attribute} = $value;
            }

            $model->save();
            $models[] = $model;
        }

        return $models;
    }
}
