<?php

namespace App;

class RomanNumeralGenerator implements RomanNumeralGeneratorInterface
{
    /**
     * This constant represents roman numerals and their associated values.
     *
     * @var array
     */
    protected const SYMBOLS = [
        1000 => 'M',
        900 => 'CM',
        500 => 'D',
        400 => 'CD',
        100 => 'C',
        90 => 'XC',
        50 => 'L',
        40 => 'XL',
        10 => 'X',
        9 => 'IX',
        5 => 'V',
        4 => 'IV',
        1 => 'I',
    ];

    /**
     * Convert the given integer into roman numerals.
     *
     * @param  int  $number
     * @return string
     */
    public function generate(int $number): string
    {
        $return = '';

        // If the number is invalid, let the application continue.
        if ($number < 1 || $number > 3999) {
            return $return;
        }

        foreach (self::SYMBOLS as $value => $symbol) {
            while ($number >= $value) {
                $return .= $symbol;
                $number -= $value;
            }
        }

        return $return;
    }
}
