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

    /**
     * @param string $template
     * @return string
     */
    public function render($template)
    {
        ob_start();
        include $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
}