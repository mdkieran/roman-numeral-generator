# Roman Numeral Generator

The following class can be used to convert integers ranging from 1 – 3999 to roman numerals (e.g. I, II, II, IV, etc).

## Note

I've included two implementations of the RomanNumeralGeneratorInterface, they both work however the first one is the one I would use in production as it is more efficient, the second was what I originally developed before I discovered a better way to solve the problem. I've included both to show my thinking and to demonstrate the coding knowledge I have.

## Getting Started

You will need [PHP](https://php.net), [Composer](https://getcomposer.org), and a bash terminal installed on your computer, with basic knowledge of how to use these technologies.

Next, you should run "composer install" to install all of the dependencies (mainly PHPUnit).

Finally, you may execute the example.php file in your terminal or browser.

## Methodology

Whilst working on this project, I documented the steps that I took in order to complete it.

1. First I learnt all that I could about roman numerals and how they work.
2. Next, I listed out many roman numerals in sequence within my text editor and tried to see if I could spot any patterns.
3. I then began to set up my project folders and files, and built an environment upon which to write the code in.
4. Next, I wrote what I believed to be an extensive test.
5. I then began to code with the goal of trying to pass the test, even if the code is a bit messy and/or inefficient.
6. Eventually, I passed the test, and as I understood the problem deeper, I updated my test to ensure I was testing all "kinds" of inputs.
7. Next, I tried to refactor and optimize the code, whilst still passing the test. During this time I had a eureka moment and found a different way to solve the problem, and in doing so drastically simplified the logic.
8. I then was curious to see how much more efficient the new way was to the old way, so I wrote a crude benchmark to compare.
9. Finally I tidied everything up, added missing DocBlocks comments, and ensured indentation, code formatting, and line-endings, etc were all correct.

## Testing

For testing I used PHPUnit, which is available for install using Composer and the "composer install" command (the composer.json file has been set up). To run the tests the following command "vendor/bin/phpunit tests" can be run.

## Improvements

In my view, it would be better if the generate method was a static function as there is no real need to instantiate the class. The reason I didn't do this is because I wanted to implement the given interface precisely.

## Caveats

When a given number is out of range (anything outside of 1 – 3999), an empty string is returned instead of an exception being thrown, I believe this is better as there is no sense in halting an entire application because of an inconsequential method such as this. It would be understandable to disagree with this though, depending upon how and where the method is going to be used.
