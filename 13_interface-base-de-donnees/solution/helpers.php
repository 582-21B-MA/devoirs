<?php

declare(strict_types=1);

function stringify(array $films): string
{
    $res = "";
    foreach ($films as $f) {
        foreach ($f as $k => $v) {
            $res .= "$v ";
        }
        $res .= "\n";
    }
    return $res;
}
