<?php

namespace Traits;

trait ValidateableTrait
{

    public function string($var): bool
    {
        if (gettype($var) !== "string") {
            return false;
        }
        return true;
    }

    public function required($var): bool
    {
        if (strlen($var) == 0) {
            return false;
        }
        return true;
    }

    public function min($len, $var): bool
    {
        if (strlen($var) < $len) {
            return false;
        }
        return true;
    }

    public function max($len, $var): bool
    {
        if (strlen($var) > $len) {
            return false;
        }
        return true;
    }

    public function allowed($types, $extension): bool
    {
        if (in_array($extension, $types)) {
            return true;
        }
        return false;
    }
}
