<?php

namespace Micro\Plugin\Eav\Facade\Value;

use Micro\Plugin\Eav\Entity\Entity\EntityInterface;
use Micro\Plugin\Eav\Entity\Value\ValueInterface;

interface ValueFacadeInterface
{
    /**
     * @param EntityInterface $entity
     * @param string $attribute
     *
     * @return ValueInterface
     */
    public function getValue(EntityInterface $entity, string $attribute): ValueInterface;

    /**
     * @param EntityInterface $entity
     *
     * @return iterable<ValueInterface>
     */
    public function getValues(EntityInterface $entity): iterable;
}
