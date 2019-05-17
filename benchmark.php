<?php

require_once __DIR__ . '/vendor/autoload.php';

function crude_benchmark(\App\RomanNumeralGeneratorInterface $romanNumeralGenerator): string
{
    // Begin timer
    $start_time = microtime(true);

    // Execute the method thousands of times
    for ($a = 0; $a < 200; $a += 1) {
        for ($b = 1; $b < 4000; $b += 1) {
            $romanNumeralGenerator->generate($b);
        }
    }

    $result = number_format((microtime(true) - $start_time), 3);
    return get_class($romanNumeralGenerator) . ' took ' . $result . ' seconds.';
}

$romanNumeralGenerator = new \App\RomanNumeralGenerator;
echo crude_benchmark($romanNumeralGenerator) . '<br/>';

$romanNumeralGenerator2 = new \App\RomanNumeralGenerator2;
echo crude_benchmark($romanNumeralGenerator2);
