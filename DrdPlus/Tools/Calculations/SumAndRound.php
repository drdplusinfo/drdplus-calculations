<?php
namespace DrdPlus\Tools\Calculations;

use Granam\Float\Tools\ToFloat;

class SumAndRound
{

    /**
     * @param number $number
     *
     * @return int
     */
    public static function round($number)
    {
        return intval(round(ToFloat::toFloat($number)));
    }

    /**
     * @param number $number
     *
     * @return int
     */
    public static function floor($number)
    {
        return intval(floor(ToFloat::toFloat($number)));
    }

    /**
     * @param number $number
     *
     * @return int
     */
    public static function ceil($number)
    {
        return intval(ceil(ToFloat::toFloat($number)));
    }

    /**
     * @param number $firstNumber
     * @param number $secondNumber
     *
     * @return int
     */
    public static function average($firstNumber, $secondNumber)
    {
        return self::round((ToFloat::toFloat($firstNumber) + ToFloat::toFloat($secondNumber)) / 2);
    }

    /**
     * @param number $number
     *
     * @return int
     */
    public static function half($number)
    {
        return self::round(ToFloat::toFloat($number) / 2);
    }

    /**
     * @param number $number
     *
     * @return int
     */
    public static function flooredHalf($number)
    {
        return self::floor(ToFloat::toFloat($number) / 2);
    }

    /**
     * @param number $number
     *
     * @return int
     */
    public static function ceiledHalf($number)
    {
        return self::ceil(ToFloat::toFloat($number) / 2);
    }

    /**
     * @param number $number
     *
     * @return int
     */
    public static function third($number)
    {
        return self::round(ToFloat::toFloat($number) / 3);
    }

    /**
     * @param number $number
     *
     * @return int
     */
    public static function flooredThird($number)
    {
        return self::floor(ToFloat::toFloat($number) / 3);
    }

    /**
     * @param number $number
     *
     * @return int
     */
    public static function ceiledThird($number)
    {
        return self::ceil(ToFloat::toFloat($number) / 3);
    }
}
