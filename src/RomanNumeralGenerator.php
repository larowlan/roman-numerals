<?php

namespace Larowlan\RomanNumeral;

/**
 * Defines a class for generating roman numerals from integers.
 */
class RomanNumeralGenerator {
/**
 * Initialise a lookup array containing the defaults
 */
  private $lookup_key = array(
    "M" => 1000,
    "CM" => 900,
    "D" => 500,
    "CD" => 400,
    "C" => 100,
    "XC" => 90,
    "L" => 50,
    "XL" => 40,
    "X" => 10,
    "IX" => 9,
    "V" => 5,
    "IV" => 4,
    "I" => 1
  );
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

    $result = "";
    foreach ($lookup_key as $roman_numeral => $integer_value)  
     { 
         $matches = intval($number / $integer_value); 
         $result .= str_repeat($roman_numeral, $matches); 
         $number = $number % $integer_value; 
     } 
     if ($lowerCase) {
      return strtolower($result);
    }
    return $result;
  }

}