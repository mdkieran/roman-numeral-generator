<?php

namespace Tests;

use App\RomanNumeralGenerator;
use PHPUnit\Framework\TestCase;

final class RomanNumeralGeneratorTest extends TestCase
{
    /**
     * Test the generate method using supported integers.
     *
     * @return void
     */
    public function testGenerate(): void
    {
        $symbols = [
            // Triplets
            1    => 'I', 2    => 'II', 3    => 'III',
            10   => 'X', 20   => 'XX', 30   => 'XXX',
            100  => 'C', 200  => 'CC', 300  => 'CCC',
            1000 => 'M', 2000 => 'MM', 3000 => 'MMM',

            // Before midway
            4 => 'IV', 40 => 'XL', 400 => 'CD', 444 => 'CDXLIV',

            // Midway
            5 => 'V', 50 => 'L', 500 => 'D', 555 => 'DLV',

            // After midway
            7 => 'VII', 76 => 'LXXVI', 603 => 'DCIII', 1888 => 'MDCCCLXXXVIII',

            // Before next multiple of ten
            9 => 'IX', 90 => 'XC', 900 => 'CM', 999 => 'CMXCIX',

            // Octal, hex, and binary representations of integers
            0123 => 'LXXXIII', 0x1A => 'XXVI', 0b11111111 => 'CCLV',
        ];

        $romanNumeralGenerator = new RomanNumeralGenerator;

        foreach ($symbols as $number => $symbol) {
            $generatedSymbol = $romanNumeralGenerator->generate($number);
            $this->assertSame($generatedSymbol, $symbol);
        }
    }

    /**
     * Test what happens when we pass an integer that is not supported.
     *
     * @return void
     */
    public function testGenerateOutOfRange(): void
    {
        $romanNumeralGenerator = new RomanNumeralGenerator;

        $this->assertSame($romanNumeralGenerator->generate(-1),   '');
        $this->assertSame($romanNumeralGenerator->generate(0),    '');
        $this->assertSame($romanNumeralGenerator->generate(4000), '');
    }
}
