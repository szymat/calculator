<?php

namespace Calculator\Strategy;

use Webit\Wrapper\BcMath\BcMathNumber;

class MultiplicationStrategy implements CalculationStrategyInterface
{
    public function execute(mixed $a, mixed $b): string
    {
        return (new BcMathNumber($a))->mul($b)->getValue();
    }
}