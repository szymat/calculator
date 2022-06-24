<?php

namespace Calculator\Strategy;

use Calculator\Exception\InvalidInputException;
use Webit\Wrapper\BcMath\BcMathNumber;

class DivisionStrategy implements CalculationStrategyInterface
{
    /**
     * @throws InvalidInputException
     */
    public function execute(mixed $a, mixed $b): string
    {
        try {
            return (new BcMathNumber($a))->div($b)->getValue();
        } catch (\DivisionByZeroError) {
            throw new InvalidInputException("Division by zero is not allowed.");
        }
    }
}