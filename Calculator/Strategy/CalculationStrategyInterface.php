<?php

namespace Calculator\Strategy;

interface CalculationStrategyInterface
{
    public function execute(mixed $a, mixed $b) : string;
}