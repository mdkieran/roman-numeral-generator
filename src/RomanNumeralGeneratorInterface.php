<?php

namespace App;

interface RomanNumeralGeneratorInterface
{
    /**
     * Convert the given integer into a roman numeral.
     *
     * @param  int  $number
     * @return string
     */
    public function generate(int $number): string;
}
