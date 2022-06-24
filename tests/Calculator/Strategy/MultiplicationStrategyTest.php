<?php

namespace Calculator\Tests\Calculator\Strategy;

use Calculator\Strategy\MultiplicationStrategy;
use PHPUnit\Framework\TestCase;
use Webit\Wrapper\BcMath\BcMathNumber;

class MultiplicationStrategyTest extends TestCase
{
    public function testMultiplication(): void
    {
        $strategy = new MultiplicationStrategy();
        $this->assertTrue((new BcMathNumber(22.11))->isEquals($strategy->execute(2.01, "11")));
        $this->assertTrue((new BcMathNumber(120.0000008))->isEquals($strategy->execute(0.001200000008, "100000")));
        $this->assertTrue((new BcMathNumber("0"))->isEquals($strategy->execute(0, "564564.50")));
        $this->assertTrue((new BcMathNumber(199999998))->isEquals($strategy->execute(2, 99999999)));
    }
}