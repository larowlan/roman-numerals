<?php

namespace Larowlan\RomanNumeral;

/**
 * Defines a class for generating roman numerals from integers.
 */
class RomanNumeralGenerator {

  /**
   * Generates a roman numeral from an integer.
   *
   * @param int $number
   *   Integer to convert.
   * @param bool $lowerCase
   *   (optional) Pass TRUE to convert to lowercase. Defaults to FALSE.
   *
   * @return string
   *   Roman numeral representing the passed integer.
   */
    public function generate(int $number, bool $lowerCase = TRUE) : string {

        $result = '';

        // Create lookup array containing set of Roman numerals in Uppercase.
        $numeralLookup = [
            'M' => 1000,
            'CM' => 900,
            'D' => 500,
            'CD' => 400,
            'C' => 100,
            'XC' => 90,
            'L' => 50,
            'XL' => 40,
            'X' => 10,
            'IX' => 9,
            'V' => 5,
            'IV' => 4,
            'I' => 1
        ];

        foreach ($numeralLookup as $roman => $value) {
            // Determine number of matches found.
            $matches = intval($number / $value);
            // Add same number of characters.
            $result .= str_repeat($roman, $matches);
            // Set the number to be the remainder of number and value.
            $number = $number % $value;
        }
        // If lowerCase is TRUE return lowercase Roman Numerals.
        if ($lowerCase) {
            $result = strtolower($result);
        }
        // Else return uppercase Roman Numerals.
        return $result;

    }

}