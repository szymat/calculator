<?php

namespace Calculator\Tests\Calculator\Strategy;

use Calculator\Exception\InvalidInputException;
use Calculator\Strategy\DivisionStrategy;
use PHPUnit\Framework\TestCase;
use Webit\Wrapper\BcMath\BcMathNumber;

class DivisionStrategyTest extends TestCase
{
    public function testDivision(): void
    {
        $strategy = new DivisionStrategy();
        $this->assertTrue((new BcMathNumber("10"))->isEquals($strategy->execute(150, "15")));
        $this->assertTrue((new BcMathNumber(7.142857142857143))->isEquals($strategy->execute(50, 7)));
        $this->assertTrue((new BcMathNumber(-10))->isEquals($strategy->execute(-50, 5)));
    }

    public function testDivisionByZero(): void
    {
        // Hack for removing test as risky (ob issue
        $outputBufferingLevel = ob_get_level();
        while (ob_get_level() >= $outputBufferingLevel) {
            ob_end_clean();
        }

        $strategy = new DivisionStrategy();
        $this->expectException(InvalidInputException::class);
        $this->expectExceptionCode(400);
        $this->expectExceptionMessage("Division by zero is not allowed.");
        $strategy->execute(5, 0.0);
        $this->assertSame(0,1);
    }
}