<?php

namespace Micro\Plugin\Eav\Business\Value\Manager;

use Micro\Plugin\Eav\Entity\Attribute\AttributeInterface;
use Micro\Plugin\Eav\Entity\Entity\EntityInterface;
use Micro\Plugin\Eav\Entity\Value\ValueInterface;


interface ValueResolverInterface
{
    /**
     * @param EntityInterface $entity
     * @param AttributeInterface $attribute
     *
     * @return ValueInterface
     */
    public function getValue(EntityInterface $entity, AttributeInterface $attribute): ValueInterface;

    /**
     * @param EntityInterface $entity
     * @param AttributeInterface $attribute
     * @param ValueInterface $value
     *
     * @return EntityInterface
     */
    public function setValue(EntityInterface $entity, AttributeInterface $attribute, ValueInterface $value): EntityInterface;
}
