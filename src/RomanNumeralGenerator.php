<?php

namespace Larowlan\RomanNumeral;

/**
 * Defines a class for generating roman numerals from integers.
 */
class RomanNumeralGenerator {

  /**
   * @var $roman_numerals
   *   A map of roman numerals and the number equivalent.
   */
  private $roman_numerals = [
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
  public function generate(int $number, bool $lowerCase = FALSE) : string {

     $roman_numeral = '';

     foreach ($this->roman_numerals as $roman => $numeral) {
        $match = ($number / $numeral);
        $roman_numeral .= str_repeat($roman, $match);
        $number = ($number % $numeral);
     }

     return ($lowerCase) ? strtolower($roman_numeral) : $roman_numeral;

  }

}
