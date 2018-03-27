<?php

namespace Larowlan\RomanNumeral\Tests;

use Larowlan\RomanNumeral\RomanNumeralGenerator;

/**
 * Defines a class for testing roman numeral generation.
 *
 * @group Unit
 */
class RomanNumeralGeneratorTest extends \PHPUnit_Framework_TestCase {

  /**
   * Generator under test.
   *
   * @var \Larowlan\RomanNumeral\RomanNumeralGenerator
   */
  protected $generator;
  protected $expectedData;
  protected $outputData = Array();

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();
    $this->generator = new RomanNumeralGenerator();
  }

  /**
   * Tests roman numeral generation.
   *
   * @dataProvider providerTestGeneration
   */
  public function testGeneration($number, $expected) {
    $this->assertEquals($expected, $this->generator->generate($number));
  }

  /**
   * Data provider for testGeneration().
   *
   * @return array
   *   Test cases.
   */
  public function providerTestGeneration() {
    return [
      1 => [1, "I"],
      2 => [2, "II"],
      3 => [3, "III"],
      4 => [4, "IV"],
      5 => [5, "V"],
      6 => [6, "VI"],
      9 => [9, "IX"],
      27 => [27, "XXVII"],
      48 => [48, "XLVIII"],
      59 => [59, "LIX"],
      93 => [93, "XCIII"],
      141 => [141, "CXLI"],
      163 => [163, "CLXIII"],
      402 => [402, "CDII"],
      575 => [575, "DLXXV"],
      911 => [911, "CMXI"],
      1024 => [1024, "MXXIV"],
      3000 => [3000, "MMM"],
    ];
  }



    /**
     * Tests roman numeral generation.
     *
     * @dataProvider providerTestRomanNumeralsInLowerCase
     */
  public function testRomanNumeralsInLowerCase($number, $expected){
      $this->assertEquals($expected, $this->generator->generate($number, TRUE));

  }


    /**
     * Data provider for testRomanNumeralsInLowerCase().
     *
     * @return array
     *   Test cases.
     */
  public function  providerTestRomanNumeralsInLowerCase(){
      $this->expectedData= $this->providerTestGeneration();
      foreach($this->expectedData as $key => $value){
          $this->outputData[$key] = [$value[0], strtolower($value[1])];
      }
      return $this->outputData;
  }
}
