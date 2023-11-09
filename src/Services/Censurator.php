<?php

namespace App\Services;

class Censurator
{

    const WORDS = ["casino", "viagra", "bad", "banana"];

    public function purify(string $text)
    {
        foreach (self::WORDS as $word) {
            $replacement = str_repeat("*", mb_strlen($word));
            $text = preg_replace("/[^\w]" . $word . "[^\w]/i", $replacement, $text);
        }

        return $text;
    }

}