<?php

namespace Traits;

trait SanitizeableTrait
{
    public function sanitize($var): string
    {
        return htmlspecialchars(strip_tags($var));
    }

    public function prepare($link, $var): string
    {
        return mysqli_real_escape_string($link, $var);
    }
}
