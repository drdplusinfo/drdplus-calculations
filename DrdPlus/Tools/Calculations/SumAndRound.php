<?php
namespace DrdPlus\Tools\Calculations;

use Granam\Float\Tools\ToFloat;

class SumAndRound
{

    /**
     * @param number $number
     * @return int
     */
    public static function round($number)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return (int)round(ToFloat::toFloat($number));
    }

    /**
     * @param number $number
     * @return int
     */
    public static function floor($number)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return (int)floor(ToFloat::toFloat($number));
    }

    /**
     * @param number $number
     * @return int
     */
    public static function ceil($number)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return (int)ceil(ToFloat::toFloat($number));
    }

    /**
     * @param number $firstNumber
     * @param number $secondNumber
     * @return int
     */
    public static function average($firstNumber, $secondNumber)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return self::round((ToFloat::toFloat($firstNumber) + ToFloat::toFloat($secondNumber)) / 2);
    }

    /**
     * @param number $number
     * @return int
     */
    public static function half($number)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return self::round(ToFloat::toFloat($number) / 2);
    }

    /**
     * @param number $number
     * @return int
     */
    public static function flooredHalf($number)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return self::floor(ToFloat::toFloat($number) / 2);
    }

    /**
     * @param number $number
     * @return int
     */
    public static function ceiledHalf($number)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return self::ceil(ToFloat::toFloat($number) / 2);
    }

    /**
     * @param number $number
     * @return int
     */
    public static function third($number)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return self::round(ToFloat::toFloat($number) / 3);
    }

    /**
     * @param number $number
     * @return int
     */
    public static function flooredThird($number)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return self::floor(ToFloat::toFloat($number) / 3);
    }

    /**
     * @param number $number
     * @return int
     */
    public static function ceiledThird($number)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return self::ceil(ToFloat::toFloat($number) / 3);
    }
}