<?php

namespace Micro\Plugin\Eav\Business\Value\Factory;

use Micro\Plugin\Eav\Entity\Value\ValueInterface;

interface ValueFactoryInterface
{
    /**
     * @param string $valueType
     *
     * @return ValueInterface
     */
    public function create(string $valueType): ValueInterface;
}
