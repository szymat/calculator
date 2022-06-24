<?php

namespace Calculator\Tests\Calculator\Strategy;

use Calculator\Strategy\SubtractionStrategy;
use PHPUnit\Framework\TestCase;
use Webit\Wrapper\BcMath\BcMathNumber;

class SubtractionStrategyTest extends TestCase
{
    public function testSubtraction(): void
    {
        $strategy = new SubtractionStrategy();
        $this->assertTrue((new BcMathNumber(-9))->isEquals($strategy->execute(2, "11")));
        $this->assertTrue((new BcMathNumber(120))->isEquals($strategy->execute(120.0000008, "0.0000008")));
        $this->assertTrue((new BcMathNumber(-500))->isEquals($strategy->execute(0, 500)));
    }
}