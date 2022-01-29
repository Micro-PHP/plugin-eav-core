<?php

namespace Micro\Plugin\Eav\Business\Value\Set;

use Micro\Plugin\Eav\Entity\Value\ValueInterface;
use Micro\Plugin\Eav\Exception\InvalidArgumentException;

interface ValueObjectSetInterface
{
    /**
     * @param ValueInterface $valueObject
     * @param mixed $value
     *
     * @throws InvalidArgumentException
     *
     * @return ValueInterface
     */
    public function set(ValueInterface $valueObject, mixed $value): ValueInterface;
}
