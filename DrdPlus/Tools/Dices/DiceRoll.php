<?php
namespace DrdPlus\Tools\Dices;

use Granam\Strict\Object\StrictObject;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table
 */
class DiceRoll extends StrictObject
{

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var \DrdPlus\Tools\Dices\Dice
     *
     * @ORM\ManyToOne(targetEntity="DrdPlus\Tools\ValueObject\Dice")
     */
    private $dice;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private $evaluatedValue;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private $rolledNumber;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private $rollSequence;

    /**
     * @param \Drd\DiceRoll\DiceRoll $diceRoll
     */
    public function __construct(\Drd\DiceRoll\DiceRoll $diceRoll)
    {
        $this->dice = DiceFactory::createDice($diceRoll->getDice());
        $this->evaluatedValue = $diceRoll->getEvaluatedValue()->getValue();
        $this->rolledNumber = $diceRoll->getRolledNumber()->getValue();
        $this->rollSequence = $diceRoll->getRollSequence()->getValue();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \DrdPlus\Tools\Dices\Dice
     */
    public function getDice()
    {
        return $this->dice;
    }

    /**
     * @return int
     */
    public function getEvaluatedValue()
    {
        return $this->evaluatedValue;
    }

    /**
     * @return int
     */
    public function getRollSequence()
    {
        return $this->rollSequence;
    }

    /**
     * @return int
     */
    public function getRolledNumber()
    {
        return $this->rolledNumber;
    }

}
