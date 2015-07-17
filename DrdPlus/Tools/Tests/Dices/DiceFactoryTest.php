<?php
namespace DrdPlus\Tools\Tests\Dices;

use DrdPlus\Tools\Dices\Dice;
use DrdPlus\Tools\Dices\DiceFactory;
use DrdPlus\Tools\Tests\TestWithMockery;
use Granam\Integer\IntegerObject;

class DiceFactoryTest extends TestWithMockery
{

    /**
     * @test
     */
    public function can_create_dice()
    {
        $dice = DiceFactory::createDice($this->createDrdDice());

        $this->assertInstanceOf(Dice::class, $dice);
    }

    /**
     * @return \Drd\DiceRoll\Dice|\Mockery\MockInterface
     */
    private function createDrdDice()
    {
        /** @var \Drd\DiceRoll\Dice|\Mockery\MockInterface $drdDice */
        $drdDice = $this->mockery(\Drd\DiceRoll\Dice::class);
        $drdDice->shouldReceive('getMinimum')
            ->once()
            ->andReturn($minimum = $this->mockery(IntegerObject::class));
        $minimum->shouldReceive('getValue')
            ->once()
            ->andReturn(1);
        $drdDice->shouldReceive('getMaximum')
            ->once()
            ->andReturn($maximum = $this->mockery(IntegerObject::class));
        $maximum->shouldReceive('getValue')
            ->once()
            ->andReturn(2);

        return $drdDice;
    }
}
