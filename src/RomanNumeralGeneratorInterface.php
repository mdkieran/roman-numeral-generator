<?php

namespace App;

interface RomanNumeralGeneratorInterface
{
    /**
     * Convert the given integer into roman numerals.
     *
     * @param  int  $number
     * @return string
     */
    public function generate(int $number): string;
}
