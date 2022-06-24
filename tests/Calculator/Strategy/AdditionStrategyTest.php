<?php

namespace Calculator\Tests\Calculator\Strategy;

use Calculator\Strategy\AdditionStrategy;
use PHPUnit\Framework\TestCase;
use Webit\Wrapper\BcMath\BcMathNumber;

class AdditionStrategyTest extends TestCase
{
    public function testAdditions(): void
    {
        $strategy = new AdditionStrategy();
        $this->assertTrue((new BcMathNumber("12.40"))->isEquals($strategy->execute(1.40, "11")));
        $this->assertTrue((new BcMathNumber(12.00000008))->isEquals($strategy->execute(12, "0.00000008")));
        $this->assertTrue((new BcMathNumber("0"))->isEquals($strategy->execute(-5.50, "5.50")));
        $this->assertTrue((new BcMathNumber(199999998))->isEquals($strategy->execute(99999999, 99999999)));
    }
}