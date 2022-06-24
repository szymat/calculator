<?php

namespace Calculator\DTO;

use Calculator\Enum\CalculationTypeEnum;
use Symfony\Component\Validator\Constraints as Assert;

class InputDTO
{
    // Assertions and `mixed` are for symfony serializer typing issues
    #[Assert\Type(type: 'numeric')]
    #[Assert\NotNull]
    private mixed $a;
    #[Assert\Type(type: 'numeric')]
    #[Assert\NotNull]
    private mixed $b;
    #[Assert\Choice(callback: [CalculationTypeEnum::class, 'choices'])]
    private string $type;

    public function getA(): mixed
    {
        return $this->a;
    }

    public function setA(mixed $a): void
    {
        $this->a = $a;
    }

    public function getB(): mixed
    {
        return $this->b;
    }

    public function setB(mixed $b): void
    {
        $this->b = $b;
    }

    public function getType(): CalculationTypeEnum
    {
        return CalculationTypeEnum::from($this->type);
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }
}