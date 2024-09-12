<?php

declare(strict_types=1);
require "check_expect.php";

/**
 * Applique $func sur chaque élément de $arr et retourne le résultat.
 */
function map_recur(array $arr, callable $func): array
{
    if (count($arr) === 0) {
        return [];
    }
    return array_merge(
        [$func($arr[0])],
        map_recur(array_slice($arr, 1), $func)
    );
}

check_expect(map_recur([1, 2, 3], fn($n) => $n + 1), [2, 3, 4]);

/**
 * Applique $func sur chaque élément de $arr et retourne le résultat.
 */
function map_loop(array $arr, callable $func): array
{
    $res = [];
    foreach ($arr as $e) {
        array_push($res, $func($e));
    }
    return $res;
}

check_expect(map_loop([1, 2, 3], fn($n) => $n + 1), [2, 3, 4]);

/**
 * Retourne un nouveau tableau qui contient seulement les éléments pour
 * lesquels la valeur de $func, une fois appliquée sur l'élément, est
 * vrai.
 */
function filter_recur(array $arr, callable $func): array
{
    if (count($arr) === 0) {
        return [];
    }
    if (!$func($arr[0])) {
        return filter_recur(array_slice($arr, 1), $func);
    }
    return array_merge([$arr[0]], filter_recur(array_slice($arr, 1), $func));
}

check_expect(filter_recur([1, 2, 3], fn($n) => $n === 2), [2]);
check_expect(filter_recur([1, 2, 3], fn($n) => $n > 1), [2, 3]);

/**
 * Retourne un nouveau tableau qui contient seulement les éléments pour
 * lesquels la valeur de $func, une fois appliquée sur ceux-ci, est
 * vrai.
 */
function filter_iter(array $arr, callable $func): array
{
    $res = [];
    foreach ($arr as $e) {
        if (!$func($e)) {
            continue;
        }
        array_push($res, $e);
    }
    return $res;
}

check_expect(filter_iter([1, 2, 3], fn($n) => $n === 2), [2]);
check_expect(filter_iter([1, 2, 3], fn($n) => $n > 1), [2, 3]);

/**
 * Retourne un nouveau compte.
 */
function new_account($balance): array
{
    return [
        "deposit" => function (int $amount) use (&$balance): int {
            return $balance += $amount;
        },
        "withdraw" => function (int $amount) use (&$balance): int {
            return $balance -= $amount;
        },
    ];
}
