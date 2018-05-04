<?php

namespace App;

class AdminDataTable
{
    protected $models;
    protected $functions;
    protected $view;

    public function __construct(iterable $models, iterable $functions)
    {
        $this->models = $models;
        $this->functions = $functions;
        $this->view = new View();
    }

    public function render()
    {
        $this->view->functions = $this->functions;
        $this->view->models = $this->models;
        return $this->view->render(__DIR__ . '/../admin/templates/temp_admin-data-table.php');
    }
}