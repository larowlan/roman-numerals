<?php

namespace Larowlan\RomanNumeral;

/**
 * Defines a class for generating roman numerals from integers.
 */
class RomanNumeralGenerator {

  /**
   * @var array Roman numerals look up table
   */
  const ROMAN_NUMERAL_LOOK_UP = [
    1 => 'I',
    2 => 'II',
    3 => 'III',
    4 => 'IV',
    5 => 'V',
    6 => 'VI',
    7 => 'VII',
    8 => 'VIII',
    9 => 'IX',
    10 => 'X',
    20 => 'XX',
    30 => 'XXX',
    40 => 'XL',
    50 => 'L',
    60 => 'LX',
    70 => 'LXX',
    80 => 'LXXX',
    90 => 'XC',
    100 => 'C',
    200 => 'CC',
    300 => 'CCC',
    400 => 'CD',
    500 => 'D',
    600 => 'DC',
    700 => 'DCC',
    800 => 'DCCC',
    900 => 'CM',
    1000 => 'M',
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

    //Initialize variables
    $placeValue = 1000;
    $look_up = self::ROMAN_NUMERAL_LOOK_UP;

    //Handle edge case where number is greater than 1000
    if ($number >= 2000) {
      $quotient =  intval($number/$placeValue);

      for ($i=0; $i<$quotient; $i++) {
        $roman_numeral .= $look_up[1000];
      }

      $number = $number%$placeValue;
      $placeValue = $placeValue/10;
    }

    //Run loop to generate roman numeral
    while ($placeValue >= 1) {
      if ($number < $placeValue) {
        $number = $number%$placeValue;
        $placeValue = $placeValue/10;
        continue;
      }

      $quotient =  intval($number/$placeValue);
      $roman_numeral = $roman_numeral . $look_up[$quotient*$placeValue];

      $number = $number%$placeValue;
      $placeValue = $placeValue/10;
    }

    //Return roman numeral in lower case if bool is set, else default case
    return $lowerCase ? strtolower($roman_numeral) : $roman_numeral;
  }

}
