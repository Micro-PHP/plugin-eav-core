<?php

namespace Micro\Plugin\Eav\Business\Value\Manager;

use Micro\Plugin\Eav\Entity\Attribute\AttributeInterface;
use Micro\Plugin\Eav\Entity\Value\ValueInterface;

interface ValueFactoryInterface
{
    /**
     * @param AttributeInterface $attribute
     *
     * @return ValueInterface
     */
    public function createValue(AttributeInterface $attribute): ValueInterface;
}
