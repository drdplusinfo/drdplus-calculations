<?php
namespace DrdPlus\Tools\Dices;

interface DiceInterface
{
    /**
     * @return int
     */
    public function getMinimum();

    /**
     * @return int
     */
    public function getMaximum();
}
