<?php
namespace DrdPlus\Tools\Tests;

class TestWithMockery extends \PHPUnit_Framework_TestCase
{
    protected function tearDown()
    {
        \Mockery::close();
    }

    /**
     * @param string $className
     * @return \Mockery\MockInterface
     */
    protected function mockery($className)
    {
        return \Mockery::mock($className);
    }
}
