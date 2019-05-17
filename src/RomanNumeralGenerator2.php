<?php

namespace App;

class RomanNumeralGenerator2 implements RomanNumeralGeneratorInterface
{
    /*
    |--------------------------------------------------------------------------
    | Note
    |--------------------------------------------------------------------------
    |
    | This is the original solution I came up with before discovering a
    | drastically simpler way.
    |
    */

    /**
     * This constant represents roman numerals and their associated values.
     *
     * @var array
     */
    protected const SYMBOLS = [
           1 => 'I',
           5 => 'V',
          10 => 'X',
          50 => 'L',
         100 => 'C',
         500 => 'D',
        1000 => 'M',
    ];

    /**
     * Convert an integer to roman numerals.
     *
     * @param  int  $number
     * @return string
     */
    public function generate(int $number): string
    {
        $this->validates($number);

        $return = '';

        $exponents = [1000, 100, 10, 1];

        foreach ($exponents as $exponent) {
            if ($number >= $exponent) {
                $value = $number - ($number % $exponent);
                $return .= $this->convert($value, $exponent);
                $number -= $value;
            }
        }

        return $return;
    }

    /**
     * If the given exponent is 10, we will use that as a base to work out the
     * roman numerals between it and the next exponent (which would be 100 in
     * this case).
     *
     * @param  int  $number
     * @param  int  $exponent
     * @return string
     */
    protected function convert(int $number, int $exponent = 1)
    {
        // What is half way between this exponent and the next exponent?
        $half = $exponent * 5;

        // What is the next exponent?
        $next = $exponent * 10;

        // Triplets (e.g. I, II, III, X, XX, XXX).
        if ($number >= $exponent && $number < ($half - $exponent)) {
            $repeat = ($number / $exponent);
            return str_repeat(self::SYMBOLS[$exponent], $repeat);
        }

        // Before midway (e.g. IV, XL, CD).
        if ($number === ($half - $exponent)) {
            return self::SYMBOLS[$exponent] . self::SYMBOLS[$half];
        }

        // After midway (e.g. VI, VII, VIII, XI, XII, XIII).
        if ($number > $half && $number < ($next - $exponent)) {
            $repeat = (($number - $half) / $exponent);
            return self::SYMBOLS[$half] . str_repeat(self::SYMBOLS[$exponent], $repeat);
        }

        // Before the next multiple of ten (e.g. IX, XC, CM).
        if ($number === ($next - $exponent)) {
            return self::SYMBOLS[$exponent] . self::SYMBOLS[$next];
        }

        // Exact match (e.g. I, V, X).
        if (array_key_exists($number, self::SYMBOLS)) {
            return self::SYMBOLS[$number];
        }
    }

    /**
     * Ensure the given integer is within the specified range.
     *
     * @throws \InvalidArgumentException
     * @return void
     */
    protected function validates(int $number): void
    {
        if ($number < 1 || $number > 3999) {
            throw new OutOfRangeException;
        }
    }
}
