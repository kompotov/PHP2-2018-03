<?php

namespace App\Controllers;

use App\Controller;

class NotFound extends Controller
{

    /**
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    protected function handle()
    {
        $template = $this->twig->load('temp_not-found.twig');
        $template->display([]);
    }

}