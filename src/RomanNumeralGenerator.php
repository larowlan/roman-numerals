<?php

/**
 * @file
 * Class RomanNumeralGenerator.
 */

namespace Larowlan\RomanNumeral;

/**
 * Defines a class for generating roman numerals from integers.
 */
class RomanNumeralGenerator {

  private $thousands;
  private $hundreds;
  private $tens;
  private $units;
  protected $romanThousands;
  protected $romanHundreds;
  protected $romanTens;
  protected $romanUnits;

  /**
   * RomanNumeralGenerator constructor.
   */
  public function __construct() {
    $this->romanThousands = [
      0 => '',
      1 => 'M',
      2 => 'MM',
      3 => 'MMM',
      4 => 'IV*',
      5 => 'V*',
      6 => 'VI*',
      7 => 'VII*',
      8 => 'VIII*',
      9 => 'IX*',
    ];
    $this->romanHundreds = [
      0 => '',
      1 => 'C',
      2 => 'CC',
      3 => 'CCC',
      4 => 'CD',
      5 => 'D',
      6 => 'DC',
      7 => 'DCC',
      8 => 'DCCC',
      9 => 'CM',
    ];
    $this->romanTens = [
      0 => '',
      1 => 'X',
      2 => 'XX',
      3 => 'XXX',
      4 => 'XL',
      5 => 'L',
      6 => 'LX',
      7 => 'LXX',
      8 => 'LXXX',
      9 => 'XC',
    ];
    $this->romanUnits = [
      0 => '',
      1 => 'I',
      2 => 'II',
      3 => 'III',
      4 => 'IV',
      5 => 'V',
      6 => 'VI',
      7 => 'VII',
      8 => 'VIII',
      9 => 'IX',
    ];
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
  public function generate(int $number, bool $lowerCase = FALSE): string {

    $this->setThousands(floor($number / 1000));
    $this->setHundreds(floor(($number - $this->getThousands() * 1000) / 100));
    $this->setTens(floor(($number - $this->getThousands() * 1000 - $this->getHundreds() * 100) / 10));
    $this->setUnits($number - $this->getThousands() * 1000 - $this->getHundreds() * 100 - $this->getTens() * 10);

    $output = $this->romanThousands[$this->getThousands()]
      . $this->romanHundreds[$this->getHundreds()]
      . $this->romanTens[$this->getTens()]
      . $this->romanUnits[$this->getUnits()];

    if ($lowerCase) {
      return strtolower($output);
    }
    return $output;

  }

  /**
   * Getter of Thousands.
   *
   * @return mixed
   *   Thousands.
   */
  public function getThousands() {
    return $this->thousands;
  }

  /**
   * Setter of Thousands.
   *
   * @param mixed $thousands
   */
  public function setThousands($thousands) {
    $this->thousands = $thousands;
  }

  /**
   * Getter of Hundreds.
   *
   * @return mixed
   *   Hundreds.
   */
  public function getHundreds() {
    return $this->hundreds;
  }

  /**
   * Setter of Hundreds.
   *
   * @param mixed $hundreds
   */
  public function setHundreds($hundreds) {
    $this->hundreds = $hundreds;
  }

  /**
   * Getter of Tens.
   *
   * @return mixed
   *   Tens.
   */
  public function getTens() {
    return $this->tens;
  }

  /**
   * Setter of Tens.
   *
   * @param mixed $tens
   */
  public function setTens($tens) {
    $this->tens = $tens;
  }

  /**
   * Getter of Unit.
   *
   * @return mixed
   *   Unit.
   */
  public function getUnits() {
    return $this->units;
  }

  /**
   * Setter of Unit.
   *
   * @param mixed $units
   */
  public function setUnits($units) {
    $this->units = $units;
  }
}
