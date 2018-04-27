<?php

namespace App;

class AdminDataTable
{
    protected $models;
    protected $functions;

    public function __construct(iterable $models, iterable $functions)
    {
        $this->models = $models;
        $this->functions = $functions;
    }

    public function render()
    {
        foreach ($this->models as $model) {
            $res = [];
            foreach ($this->functions as $name => $function) {
                $res[$name] = $function($model);
            }
            yield $res;
        }
    }
}