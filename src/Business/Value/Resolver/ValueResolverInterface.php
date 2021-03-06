<?php

namespace Micro\Plugin\Eav\Business\Value\Resolver;

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
    public function resolve(EntityInterface $entity, AttributeInterface $attribute): ValueInterface;
}
