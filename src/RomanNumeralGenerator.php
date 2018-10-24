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
    $return = '';
    $numberRomanMap = $this->getNumberRomanNumeralMap();
    foreach($numberRomanMap as $roman => $value){

      // Number of times have we matched with base number
      $baseMatchCount = floor($number / $value);
     
      // Repeat roman numerals based on base match count
      $return .= str_repeat($roman, $baseMatchCount);
     
      // Set the number to the remainder and continue to process
      $number = $number % $value;
    }

    if ($lowerCase) {
      $return = strtolower($return);
    }
     
     // The Roman numeral should be built, return it
     return $return;
  }

  /**
   * Return the number to roman numeral mapping
   *
   * @return array
   *   Array containing number to roman numeral mapping.
   */
  private function getNumberRomanNumeralMap() {
    return ['M' => 1000,
            'CM' => 900,
            'D' => 500,
            'CD' => 400,
            'C'  => 100,
            'XC' => 90,
            'L' => 50,
            'XL' => 40,
            'X' => 10,
            'IX' => 9,
            'V' => 5,
            'IV' => 4,
            'I' => 1];
  }
}