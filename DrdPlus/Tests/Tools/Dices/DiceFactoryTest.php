<?php
namespace DrdPlus\Tests\Tools\Dices;

use DrdPlus\Tools\Dices\Dice;
use DrdPlus\Tools\Dices\DiceFactory;
use DrdPlus\Tests\Tools\TestWithMockery;
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
     * @return \Drd\DiceRoll\DiceInterface|\Mockery\MockInterface
     */
    private function createDrdDice()
    {
        /** @var \Drd\DiceRoll\Dice|\Mockery\MockInterface $drdDice */
        $drdDice = $this->mockery(\Drd\DiceRoll\Dice::class);
        /** @noinspection PhpMethodParametersCountMismatchInspection */
        $drdDice->shouldReceive('getMinimum')
            ->once()
            ->andReturn($minimum = $this->mockery(IntegerObject::class));
        /** @noinspection PhpMethodParametersCountMismatchInspection */
        $minimum->shouldReceive('getValue')
            ->once()
            ->andReturn(1);
        /** @noinspection PhpMethodParametersCountMismatchInspection */
        $drdDice->shouldReceive('getMaximum')
            ->once()
            ->andReturn($maximum = $this->mockery(IntegerObject::class));
        /** @noinspection PhpMethodParametersCountMismatchInspection */
        $maximum->shouldReceive('getValue')
            ->once()
            ->andReturn(2);

        return $drdDice;
    }
}
