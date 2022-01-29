<?php

namespace Micro\Plugin\Eav\Business\Attribute\Resolver;

use Micro\Plugin\Eav\Entity\Attribute\AttributeInterface;
use Micro\Plugin\Eav\Entity\Entity\EntityInterface;

interface EntityAttributeResolverInterface
{
    /**
     * @param EntityInterface $entity
     * @param string $attributeName
     *
     * @return AttributeInterface
     */
    public function resolve(EntityInterface $entity, string $attributeName): AttributeInterface;

    /**
     * @param EntityInterface $entity
     *
     * @return iterable<AttributeInterface>
     */
    public function list(EntityInterface $entity): iterable;
}
