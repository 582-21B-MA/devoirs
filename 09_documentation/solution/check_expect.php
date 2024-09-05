<?php

declare(strict_types=1);

/**
 * Print an error if `got` is not equal to `want`.
 */
function check_expect(mixed $got, mixed $want): void
{
    if ($got === $want) return;
    $backtrace = debug_backtrace()[0];
    $line = $backtrace["line"];
    $file = $backtrace["file"];
    $got = var_export($got, true);
    $want = var_export($want, true);
    echo "Test failed in $file on line $line \n";
    echo "Got: $got \n";
    echo "Want: $want \n";
    exit(1);
}
