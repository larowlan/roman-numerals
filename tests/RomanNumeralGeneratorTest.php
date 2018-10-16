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
   * Tests lower case roman numeral generation.
   *
   * @dataProvider providerTestGeneration
   */
  public function testLowerCaseGeneration($number, $expected) {
    $this->assertEquals(strtolower($expected), $this->generator->generate($number, true));
  }

  /**
   * Data provider for testGeneration() and testLowerCaseGeneration().
   *
   * @return array
   *   Test cases.
   */
  public function providerTestGeneration() {
    return [
      0 => [0, ""],
      1 => [1, "I"],
      2 => [2, "II"],
      3 => [3, "III"],
      4 => [4, "IV"],
      5 => [5, "V"],
      6 => [6, "VI"],
      9 => [9, "IX"],
      12 => [12, "XII"],
      27 => [27, "XXVII"],
      29 => [29, "XXIX"],
      44 => [44, "XLIV"],
      45 => [45, "XLV"],
      48 => [48, "XLVIII"],
      59 => [59, "LIX"],
      68 => [68, "LXVIII"],
      83 => [83, "LXXXIII"],
      93 => [93, "XCIII"],
      97 => [97, "XCVII"],
      99 => [99, "XCIX"],
      141 => [141, "CXLI"],
      163 => [163, "CLXIII"],
      402 => [402, "CDII"],
      500 => [500, "D"],
      501 => [501, "DI"],
      575 => [575, "DLXXV"],
      649 => [649, "DCXLIX"],
      798 => [798, "DCCXCVIII"],
      891 => [891, "DCCCXCI"],
      911 => [911, "CMXI"],
      1000 => [1000, "M"],
      1004 => [1004, "MIV"],
      1006 => [1006, "MVI"],
      1023 => [1023, "MXXIII"],
      1024 => [1024, "MXXIV"],
      2014 => [2014, "MMXIV"],
      3000 => [3000, "MMM"],
      3999 => [3999, "MMMCMXCIX"],
    ];
  }
}
