<?php

declare(strict_types=1);
require "check_expect.php";

function has_winner(array $board): bool
{
    $winning_combinations = [
        [0, 1, 2],
        [3, 4, 5],
        [6, 7, 8],
        [0, 3, 6],
        [1, 4, 7],
        [2, 5, 8],
        [0, 4, 8],
        [2, 4, 6],
    ];
    foreach ($winning_combinations as $c) {
        $squares_to_check = [$board[$c[0]], $board[$c[1]], $board[$c[2]]];
        $squares_are_same =
            $squares_to_check[0] === $squares_to_check[1]
            && $squares_to_check[1] === $squares_to_check[2];
        $has_empty_square = in_array("_", $squares_to_check);
        $no_winner_in_line = $has_empty_square || !$squares_are_same;
        if ($no_winner_in_line) continue;
        return true;
    }
    return false;
}

check_expect(has_winner(["x", "_", "x", "_", "_", "_", "_", "_", "_"]), false);
check_expect(has_winner(["x", "x", "x", "_", "_", "_", "_", "_", "_"]), true);
check_expect(has_winner(["x", "o", "_", "o", "x", "_", "o", "_", "x"]), true);

function game_state(array $board): string
{
    if (has_winner($board)) return "remportée";
    if (in_array("_", $board)) return "en cours";
    return "égale";
}

check_expect(game_state(["x", "_", "x", "_", "_", "_", "_", "_", "_"]), "en cours");
check_expect(game_state(["x", "x", "x", "_", "_", "_", "_", "_", "_"]), "remportée");
check_expect(game_state(["x", "o", "x", "o", "x", "o", "o", "x", "o"]), "égale");
