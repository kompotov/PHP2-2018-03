<?php

namespace App;

abstract class AdminController
{

    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    protected function access(): bool
    {
        if (isset($_GET['admin']) && $_GET['admin'] == 'yes') { // для примера
            return true;
        }
        return false;
    }

    public function __invoke()
    {
        if ($this->access()) {
            $this->handle();
        } else {
            die('Доступ закрыт');
        }
    }

    abstract protected function handle();

}