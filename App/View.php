<?php

namespace App;

class View
{
    use ArbitraryProperties;

    /**
     * @param string $template
     */
    public function display($template)
    {
        include $template;
    }

    public function render($template)
    {
        ob_start();
        include $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
}