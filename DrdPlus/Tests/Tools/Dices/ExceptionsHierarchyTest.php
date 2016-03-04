<?php
namespace DrdPlus\Tests\Tools\Dices;

use DrdPlus\Tools\Dices\DiceInterface;
use Granam\Exceptions\Tests\Tools\AbstractTestOfExceptionsHierarchy;

class ExceptionsHierarchyTest extends AbstractTestOfExceptionsHierarchy
{
    protected function getTestedNamespace()
    {
        return $this->getRootNamespace();
    }

    protected function getRootNamespace()
    {
        $reflection = new \ReflectionClass(DiceInterface::class);

        return $reflection->getNamespaceName();
    }

}
