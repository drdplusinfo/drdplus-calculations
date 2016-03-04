<?php
namespace DrdPlus\Tests\Tools\Dices;

use Drd\DiceRoll\Dice;
use DrdPlus\Tools\Dices\DiceRoll;
use Granam\Tests\Tools\TestWithMockery;
use Granam\Integer\IntegerObject;

class DiceRollTest extends TestWithMockery
{
    /**
     * @test
     */
    public function can_be_created()
    {
        $diceRoll = new DiceRoll($this->createDrdDiceRoll());

        $this->assertNotNull($diceRoll);
        $this->assertNull($diceRoll->getId());
    }

    /**
     * @return \Mockery\MockInterface|\Drd\DiceRoll\DiceRoll
     */
    private function createDrdDiceRoll()
    {
        $drdDiceRoll = $this->mockery(\Drd\DiceRoll\DiceRoll::class);
        $drdDiceRoll->shouldReceive('getDice')
            ->atLeast()->once()
            ->andReturn($evaluatedValue = $this->mockery(Dice::class));
        $evaluatedValue->shouldReceive('getMinimum')
            ->atLeast()->once()
            ->andReturn($minimum = $this->mockery(IntegerObject::class));
        $minimum->shouldReceive('getValue')
            ->atLeast()->once()
            ->andReturn(1);
        $evaluatedValue->shouldReceive('getMaximum')
            ->atLeast()->once()
            ->andReturn($maximum = $this->mockery(IntegerObject::class));
        $maximum->shouldReceive('getValue')
            ->atLeast()->once()
            ->andReturn(2);
        $drdDiceRoll->shouldReceive('getValue')
            ->atLeast()->once()
            ->andReturn(1);
        $drdDiceRoll->shouldReceive('getRolledNumber')
            ->atLeast()->once()
            ->andReturn($rolledNumber = $this->mockery(IntegerObject::class));
        $rolledNumber->shouldReceive('getValue')
            ->atLeast()->once()
            ->andReturn(1);
        $drdDiceRoll->shouldReceive('getSequenceNumber')
            ->atLeast()->once()
            ->andReturn($sequenceNumber = $this->mockery(IntegerObject::class));
        $sequenceNumber->shouldReceive('getValue')
            ->atLeast()->once()
            ->andReturn(1);

        return $drdDiceRoll;
    }

    /**
     * @test
     * @depends can_be_created
     */
    public function can_return_same_values_as_created_with()
    {
        $drdDiceRoll = $this->createDrdDiceRoll();
        $diceRoll = new DiceRoll($drdDiceRoll);
        $this->assertSame($drdDiceRoll->getDice()->getMaximum()->getValue(), $diceRoll->getDice()->getMaximum());
        $this->assertSame($drdDiceRoll->getDice()->getMinimum()->getValue(), $diceRoll->getDice()->getMinimum());
        $this->assertSame($drdDiceRoll->getValue(), $diceRoll->getValue());
        $this->assertSame($drdDiceRoll->getRolledNumber()->getValue(), $diceRoll->getRolledNumber());
        $this->assertSame($drdDiceRoll->getSequenceNumber()->getValue(), $diceRoll->getSequenceNumber());
    }
}
