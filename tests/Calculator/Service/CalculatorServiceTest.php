<?php

namespace Calculator\Tests\Calculator\Service;

use Calculator\Enum\CalculationTypeEnum;
use Calculator\Service\CalculatorService;
use Calculator\Strategy\AdditionStrategy;
use Calculator\Strategy\DivisionStrategy;
use Calculator\Strategy\MultiplicationStrategy;
use Calculator\Strategy\SubtractionStrategy;
use PHPUnit\Framework\TestCase;

class CalculatorServiceTest extends TestCase
{
    public function testCorrectServiceExecuted(): void
    {
        $service = new CalculatorService();
        $this->assertInstanceOf(SubtractionStrategy::class, $service->getStrategy(CalculationTypeEnum::Subtraction));
        $this->assertInstanceOf(MultiplicationStrategy::class, $service->getStrategy(CalculationTypeEnum::Multiplication));
        $this->assertInstanceOf(DivisionStrategy::class, $service->getStrategy(CalculationTypeEnum::Division));
        $this->assertInstanceOf(AdditionStrategy::class, $service->getStrategy(CalculationTypeEnum::Addition));
    }

}