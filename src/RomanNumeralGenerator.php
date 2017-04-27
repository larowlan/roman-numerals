<?php

namespace Larowlan\RomanNumeral;

/**
 * Defines a class for generating roman numerals from integers.
 */
class RomanNumeralGenerator {
  // The mapping between roman numerals and numbers.
  private $roman_mappings = array(
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

    foreach ($this->roman_mappings as $roman_number => $arabic_number) {
      $result .= str_repeat($roman_number, intval($number / $arabic_number));
      $number = $number % $arabic_number;
    }

    return $lowerCase ? strtolower($result) : $result;
  }

}
