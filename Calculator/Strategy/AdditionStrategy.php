<?php

namespace Calculator\Strategy;

use Webit\Wrapper\BcMath\BcMathNumber;

class AdditionStrategy implements CalculationStrategyInterface
{
    public function execute(mixed $a, mixed $b): string
    {
        return (new BcMathNumber($a))->add($b)->getValue();
    }
}