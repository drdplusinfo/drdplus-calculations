<?php
namespace DrdPlus\Tests\Tools\Dices;

use DrdPlus\Tools\Dices\DiceRoll;
use DrdPlus\Tools\Dices\Roll;
use Granam\Tests\Tools\TestWithMockery;

class RollTest extends TestWithMockery
{
    /**
     * @test
     */
    public function I_can_create_it_with_empty_dice_rolls()
    {
        $roll = new Roll([]);
        $this->assertSame(0, $roll->getValue());
    }

    /**
     * @test
     * @expectedException \DrdPlus\Tools\Dices\Exceptions\InvalidDiceRoll
     */
    public function I_have_to_use_dice_roll()
    {
        new Roll([new \stdClass()]);
    }

    /**
     * @test
     */
    public function I_can_get_sum_of_dice_rolls()
    {
        $roll = new Roll([$diceRoll1 = $this->mockery(DiceRoll::class), $diceRoll2 = $this->mockery(DiceRoll::class),]);
        $diceRoll1->shouldReceive('getValue')
            ->once()
            ->andReturn($diceRoll1Value = 123);
        $diceRoll2->shouldReceive('getValue')
            ->once()
            ->andReturn($diceRoll2Value = 456);
        $this->assertSame($diceRoll1Value + $diceRoll2Value, $roll->getValue());
    }
}
