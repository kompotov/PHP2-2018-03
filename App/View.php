<?php

namespace App;

class View
{
    protected $count;

    use ArbitraryProperties;

    /**
     * @param string $template
     */
    public function display($template)
    {
        include $template;
    }
}