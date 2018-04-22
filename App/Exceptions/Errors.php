<?php

namespace App\Exceptions;

class Errors extends \Exception
{

    protected $errors;

    public function addError(\Exception $e)
    {
        $this->errors[] = $e;
    }

    public function getAllErrors()
    {
        return $this->errors;
    }

    public function isErrorsArrayEmpty()
    {
        return empty($this->errors);
    }

}