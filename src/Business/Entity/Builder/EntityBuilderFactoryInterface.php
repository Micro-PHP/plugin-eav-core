<?php

namespace Micro\Plugin\Eav\Business\Entity\Builder;

use Micro\Plugin\Eav\Entity\Entity\EntityInterface;

interface EntityBuilderFactoryInterface
{
    /**
     * @param EntityInterface|null $entity
     *
     * @return EntityBuilderInterface
     */
    public function create(EntityInterface $entity = null): EntityBuilderInterface;
}
