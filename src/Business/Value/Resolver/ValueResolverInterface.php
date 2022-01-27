<?php

namespace Micro\Plugin\Eav\Business\Value\Resolver;

use Micro\Plugin\Eav\Entity\Entity\EntityInterface;
use Micro\Plugin\Eav\Entity\Value\ValueInterface;

interface ValueResolverInterface
{
    /**
     * @param EntityInterface $entity
     * @param string $attribute
     * @return ValueInterface|null
     */
    public function resolve(EntityInterface $entity, string $attribute): ?ValueInterface;
}
