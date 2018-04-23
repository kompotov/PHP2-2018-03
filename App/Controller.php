<?php

namespace App;

abstract class Controller
{

    protected $twig;

    public function __construct()
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../templates');
        $this->twig = new \Twig_Environment($loader, ['strict_variables' => true]);

    }

    protected function access(): bool
    {
        return true;
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