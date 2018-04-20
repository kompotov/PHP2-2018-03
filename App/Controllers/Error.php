<?php

namespace App\Controllers;

use App\Controller;

class Error extends Controller
{

    protected function handle()
    {
        $this->view->display(__DIR__ . '/../../templates/temp_error.php');
    }

}