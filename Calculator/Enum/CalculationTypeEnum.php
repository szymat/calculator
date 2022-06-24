<?php

namespace Calculator\Enum;

enum CalculationTypeEnum : string
{
    case Addition = 'addition';
    case Subtraction = 'subtraction';
    case Multiplication = 'multiplication';
    case Division = 'division';

    public static function choices() : array {
        return [
            self::Addition->value,
            self::Subtraction->value,
            self::Multiplication->value,
            self::Division->value,
        ];
    }
}