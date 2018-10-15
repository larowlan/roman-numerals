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
  public function generate(int $number, bool $lowerCase = FALSE) : string {
    $numerals = array( 
      "M"=>1000, 
      "CM"=>900,
      "D"=>500, 
      "CD"=>400, 
      "C"=>100, 
      "XC"=>90, 
      "L"=>50, 
      "XL"=>40, 
      "X"=>10, 
      "IX"=>9, 
      "V"=>5, 
      "IV"=>4, 
      "I"=>1 
    );	
    $result = "";
    foreach ($numerals as $key=>$value) {
      $result .= str_repeat($key, $number / $value);
      $number %= $value;
    }
    return $lowerCase ? strtolower($result) : $result;
  }

}
