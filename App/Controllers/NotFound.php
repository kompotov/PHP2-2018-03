<?php

namespace App\Controllers;

use App\Controller;

class NotFound extends Controller
{

    protected function handle()
    {
        $this->view->display(__DIR__ . '/../../templates/temp_not-found.php');
    }

}