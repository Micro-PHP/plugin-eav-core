<?php

namespace Micro\Plugin\Eav\Business\Attribute\Builder;

use Micro\Plugin\Eav\Entity\Entity\EntityInterface;

interface AttributeBuilderFactoryInterface
{
    /**
     * @param EntityInterface $entity
     *
     * @return AttributeBuilderInterface
     */
    public function create(EntityInterface $entity): AttributeBuilderInterface;
}
