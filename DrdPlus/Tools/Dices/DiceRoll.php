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
    private $value;

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
    private $sequenceNumber;

    /**
     * @param \Drd\DiceRoll\DiceRoll $diceRoll
     */
    public function __construct(\Drd\DiceRoll\DiceRoll $diceRoll)
    {
        $this->dice = DiceFactory::createDice($diceRoll->getDice());
        $this->value = $diceRoll->getValue();
        $this->rolledNumber = $diceRoll->getRolledNumber()->getValue();
        $this->sequenceNumber = $diceRoll->getSequenceNumber()->getValue();
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
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return int
     */
    public function getSequenceNumber()
    {
        return $this->sequenceNumber;
    }

    /**
     * @return int
     */
    public function getRolledNumber()
    {
        return $this->rolledNumber;
    }

}
