<?php
namespace DrdPlus\Tools\Enum;

use DrdPlus\Tools\Dices\Dice;
use Granam\Tests\Tools\TestWithMockery;
use Granam\Integer\IntegerObject;

class DiceTest extends TestWithMockery
{
    /**
     * @test
     */
    public function has_a_local_dice_interface()
    {
        $this->assertTrue(is_a(Dice::class, \DrdPlus\Tools\Dices\Dice::class, true));
    }

    /**
     * @test
     */
    public function can_be_created()
    {
        $drdDice = $this->mockery(\Drd\DiceRoll\Dice::class);
        $drdDice->shouldReceive('getMinimum')
            ->once()
            ->andReturn($minimum = $this->mockery(IntegerObject::class));
        $minimum->shouldReceive('getValue')
            ->andReturn(1);
        $drdDice->shouldReceive('getMaximum')
            ->once()
            ->andReturn($maximum = $this->mockery(IntegerObject::class));
        $maximum->shouldReceive('getValue')
            ->andReturn(2);
        /** @var Dice $drdDice */
        $instance = new Dice($drdDice);
        $this->assertNotNull($instance);
    }

    /**
     * @test
     * @depends can_be_created
     */
    public function can_return_given_minimum_value()
    {
        $drdDice = $this->mockery(\Drd\DiceRoll\Dice::class);
        $drdDice->shouldReceive('getMinimum')
            ->once()
            ->andReturn($minimum = $this->mockery(IntegerObject::class));
        $minimum->shouldReceive('getValue')
            ->andReturn($minimumValue = 1);
        $drdDice->shouldReceive('getMaximum')
            ->once()
            ->andReturn($maximum = $this->mockery(IntegerObject::class));
        $maximum->shouldReceive('getValue')
            ->andReturn(2);
        /** @var Dice $drdDice */
        $dice = new Dice($drdDice);
        $this->assertSame($minimumValue, $dice->getMinimum());
    }

    /**
     * @test
     * @depends can_be_created
     */
    public function can_return_given_maximum_value()
    {
        $drdDice = $this->mockery(\Drd\DiceRoll\Dice::class);
        $drdDice->shouldReceive('getMinimum')
            ->once()
            ->andReturn($minimum = $this->mockery(IntegerObject::class));
        $minimum->shouldReceive('getValue')
            ->andReturn(1);
        $drdDice->shouldReceive('getMaximum')
            ->once()
            ->andReturn($maximum = $this->mockery(IntegerObject::class));
        $maximum->shouldReceive('getValue')
            ->andReturn($maximumValue = 2);
        /** @var Dice $drdDice */
        $dice = new Dice($drdDice);
        $this->assertSame($maximumValue, $dice->getMaximum());
    }
}
