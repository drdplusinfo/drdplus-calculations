<?php
namespace DrdPlus\Tools\Dices;

use Granam\Integer\IntegerInterface;
use Granam\Strict\Object\StrictObject;
use Granam\Tools\ValueDescriber;

class Roll extends StrictObject implements IntegerInterface
{

    /**
     * @var array|DiceRoll[]
     */
    private $diceRolls;

    /**
     * @param array|DiceRoll[] $diceRolls
     */
    public function __construct(array $diceRolls)
    {
        $this->checkDiceRolls($diceRolls);
        $this->diceRolls = $diceRolls;
    }

    private function checkDiceRolls(array $diceRolls)
    {
        foreach ($diceRolls as $diceRoll) {
            if (!is_object($diceRoll) || !is_a($diceRoll, DiceRoll::class)) {
                throw new Exceptions\InvalidDiceRoll(
                    'Expected '. DiceRoll::class.', got ' . ValueDescriber::describe($diceRoll)
                );
            }
        }
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return array_sum(
            array_map(
                function (DiceRoll $diceRoll) {
                    return $diceRoll->getValue();
                },
                $this->diceRolls
            )
        );
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->getValue();
    }
}
