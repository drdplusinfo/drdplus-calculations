<?php
namespace DrdPlus\Tools\Dices;

use Granam\Strict\Object\StrictObject;

class DiceFactory extends StrictObject
{
    /**
     * @param DiceInterface $dice
     * @return Dice
     */
    public static function createDice(DiceInterface $dice)
    {
        return new Dice($dice);
    }
}
