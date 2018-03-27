<?php

namespace Larowlan\RomanNumeral;

/**
 * Defines a class for generating roman numerals from integers.
 */
class RomanNumeralGenerator {

    protected $roman_numerals;
    protected $matches;
    protected $res;

    /**
     * RomanNumeralGenerator constructor containing defaults as a lookup.
     */
    public function __construct()
    {
        $this->roman_numerals = array(
            'M'  => 1000,
            'CM' => 900,
            'D'  => 500,
            'CD' => 400,
            'C'  => 100,
            'XC' => 90,
            'L'  => 50,
            'XL' => 40,
            'X'  => 10,
            'IX' => 9,
            'V'  => 5,
            'IV' => 4,
            'I'  => 1);
    }

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

      $number=intval($number);

      foreach ($this->roman_numerals as $roman_num => $int_val){
          /*** divide to get  matches ***/
          $matches = intval($number / $int_val);

          /*** assign the roman char * $matches ***/
          $this->res .= str_repeat($roman_num, $matches);

          /*** substract from the number ***/
          $number = $number % $int_val;
      }

      if($lowerCase){
          return strtolower($this->res);
      }
      else{
          return $this->res;
      }

  }

}
