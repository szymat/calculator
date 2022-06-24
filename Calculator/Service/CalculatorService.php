<?php

namespace Calculator\Service;

use Calculator\Enum\CalculationTypeEnum;
use Calculator\Strategy\AdditionStrategy;
use Calculator\Strategy\CalculationStrategyInterface;
use Calculator\Strategy\DivisionStrategy;
use Calculator\Strategy\MultiplicationStrategy;
use Calculator\Strategy\SubtractionStrategy;

class CalculatorService
{
    public function getStrategy(CalculationTypeEnum $type) : CalculationStrategyInterface
    {
        return match($type) {
            CalculationTypeEnum::Addition => new AdditionStrategy(),
            CalculationTypeEnum::Division =>  new DivisionStrategy(),
            CalculationTypeEnum::Multiplication =>  new MultiplicationStrategy(),
            CalculationTypeEnum::Subtraction =>  new SubtractionStrategy(),
        };
    }

    public function calculate(mixed $a, mixed $b, CalculationTypeEnum $type) : string {
        return $this->getStrategy($type)->execute($a, $b);
    }
}