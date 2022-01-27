<?php

namespace Micro\Plugin\Eav\Business\Value\Builder;

use Micro\Plugin\Eav\Entity\Entity\EntityInterface;

interface ValueBuilderFactoryInterface
{
    /**
     * @param EntityInterface $entity
     *
     * @return ValueBuilderInterface
     */
    public function create(EntityInterface $entity): ValueBuilderInterface;
}
