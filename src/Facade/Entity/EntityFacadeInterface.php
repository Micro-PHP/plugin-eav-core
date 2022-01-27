<?php

namespace Micro\Plugin\Eav\Facade\Entity;

use Micro\Plugin\Eav\Entity\Entity\EntityInterface;

interface EntityFacadeInterface
{
    /**
     * @param EntityInterface $entity
     *
     * @return void
     */
    public function save(EntityInterface $entity): void;

    /**
     * @param EntityInterface $entity
     *
     * @return void
     */
    public function remove(EntityInterface $entity): void;
}
