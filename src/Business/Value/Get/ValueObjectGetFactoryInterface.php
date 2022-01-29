<?php

namespace Micro\Plugin\Eav\Business\Value\Get;

use Micro\Plugin\Eav\Entity\Entity\EntityInterface;

interface ValueObjectGetFactoryInterface
{
    /**
     * @param EntityInterface $entity
     * @param string $attributeName
     * @return ValueObjectGetInterface
     */
    public function create(EntityInterface $entity, string $attributeName): ValueObjectGetInterface;
}
