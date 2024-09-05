<?php

function piglatin(string $word): string
{
    $vowels = ["a", "e", "i", "o", "u", "y"];
    $first_letter_is_vowel = in_array($word[0], $vowels);
    if ($first_letter_is_vowel) return $word + "ay";
    return piglatin($word[0] + substr($word, 1));
}
