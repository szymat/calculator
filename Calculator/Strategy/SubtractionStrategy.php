<?php

namespace Calculator\Strategy;

use Webit\Wrapper\BcMath\BcMathNumber;

class SubtractionStrategy implements CalculationStrategyInterface
{
    public function execute(mixed $a, mixed $b): string
    {
        return (new BcMathNumber($a))->sub($b)->getValue();
    }
}