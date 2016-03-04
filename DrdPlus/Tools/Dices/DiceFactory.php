<?php
namespace DrdPlus\Tools\Dices;

use Granam\Strict\Object\StrictObject;

class DiceFactory extends StrictObject
{
    /**
     * @param \Drd\DiceRoll\Dice $dice
     * @return Dice
     */
    public static function createDice(\Drd\DiceRoll\Dice $dice)
    {
        return new Dice($dice);
    }
}
