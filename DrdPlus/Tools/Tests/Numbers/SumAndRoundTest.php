<?php
namespace DrdPlus\Tools\Tests\Numbers;

use DrdPlus\Tools\Numbers\SumAndRound;
use DrdPlus\Tools\Tests\TestWithMockery;

class SumAndRoundTest extends TestWithMockery
{
    /**
     * @test
     */
    public function I_can_round_a_number()
    {
        $shouldBeHigher = 4.5;
        $this->assertSame(5, SumAndRound::round($shouldBeHigher));
        $shouldBeLower = 4.4;
        $this->assertSame(4, SumAndRound::round($shouldBeLower));
    }

    /**
     * @test
     */
    public function I_can_floor_a_number()
    {
        $almostHigherInteger = 5.999999;
        $this->assertSame(5, SumAndRound::floor($almostHigherInteger));
    }

    /**
     * @test
     */
    public function I_can_ceil_a_number()
    {
        $almostHigherInteger = 5.999999;
        $this->assertSame(6, SumAndRound::ceil($almostHigherInteger));
        $integerAndBit = 8.0000001;
        $this->assertSame(9, SumAndRound::ceil($integerAndBit));
    }

    /**
     * @test
     */
    public function I_can_get_round_average_of_two_numbers()
    {
        $firstNumber = 1.5123;
        $secondNumber = 2.5123;
        $this->assertSame(2, SumAndRound::average($firstNumber, $secondNumber));
        $firstNumber = 0.49999;
        $secondNumber = 2.4999;
        $this->assertSame(1, SumAndRound::average($firstNumber, $secondNumber));
    }

    /**
     * @test
     */
    public function I_can_get_round_half_of_a_number()
    {
        $number = 5;
        $this->assertSame(3, SumAndRound::half($number));
        $number = 4.99;
        $this->assertSame(2, SumAndRound::half($number));
    }

    /**
     * @test
     */
    public function I_can_get_ceiled_half_of_a_number()
    {
        $number = 5;
        $this->assertSame(3, SumAndRound::ceiledHalf($number));
        $number = 4.0001;
        $this->assertSame(3, SumAndRound::ceiledHalf($number));
        $number = 4;
        $this->assertSame(2, SumAndRound::ceiledHalf($number));
    }
}
