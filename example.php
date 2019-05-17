<?php

require_once __DIR__ . '/vendor/autoload.php';

$romanNumeralGenerator = new \App\RomanNumeralGenerator;

echo $romanNumeralGenerator->generate((new DateTime)->format('Y'));
