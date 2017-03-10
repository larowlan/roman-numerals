# Roman-numerals

## Scenario

Client is building a page-based site to display large publications broken into a single URL per page.

As part of this, they need to be able to generate page numbers.

Their numbering scheme dictates that prefaces are numbered using roman numerals in upper case and appendices are numbered using roman numerals in lower case.

A colleague has made a start by writing test cases for the upper-case generation.

## Tasks

1. Clone the repo into your private github account.
2. Create a new branch for finishing the work.
3. Your colleague didn't get time to configure the autoloader, modify composer.json to configure the autoloader for both the src and tests folder. Tests should only be in the dev autoloader.
4. Make the existing tests pass by adding the implementation to `Larowlan\RomanNumerals\RomanNumeralGenerator::generate()`.
5. Write test cases for lowercase generation, reuse where possible.
6. Write the lower case implementation.
7. Send a Pull request against your repo's master branch and send the link for review.
