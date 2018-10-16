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
   * Tests lower case roman numeral generation.
   *
   * @dataProvider providerLowerCaseTestGeneration
   */
  public function testLowerCaseGeneration($number, $expected) {
    $this->assertEquals($expected, $this->generator->generate($number, TRUE));
  }

  /**
   * Data provider for testLowerCaseGeneration().
   *
   * @return array
   *   Test cases.
   */
  public function providerLowerCaseTestGeneration() {
    
    $data = $this->providerTestGeneration();

    foreach ($data as $key => $value) {
      $result[$key] = [$value[0], strtolower($value[1])];
    }
    
    return $result;

  }
}
