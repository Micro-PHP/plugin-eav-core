<?php

namespace Micro\Plugin\Eav\Business\Entity\Manager;

use Micro\Plugin\Eav\Entity\Entity\EntityInterface;

interface EntityObjectManagerInterface
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
