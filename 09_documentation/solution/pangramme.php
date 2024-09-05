<?php

declare(strict_types=1);
require "check_expect.php";

function is_pangram(string $sentence): bool
{
    $alphabet = "abcdefghijklmnopqrstuvwxyz";
    $sentence_letters = str_split($sentence);
    $letters_not_in_sentence = str_replace($sentence_letters, "", $alphabet);
    if (strlen($letters_not_in_sentence) > 0) return false;
    return true;
}


check_expect(is_pangram("abc"), false);
check_expect(is_pangram("The quick brown fox jumps over the lazy dog"), true);
