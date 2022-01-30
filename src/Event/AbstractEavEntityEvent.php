<?php

namespace Micro\Plugin\Eav\Event;

use Micro\Component\EventEmitter\Impl\Event\Event;
use Micro\Plugin\Eav\Entity\Entity\EntityInterface;

abstract class AbstractEavEntityEvent extends Event
{
    /**
     * @param EntityInterface $entity
     */
    public function __construct(private EntityInterface $entity)
    {
    }

    /**
     * @return EntityInterface
     */
    public function getEntity(): EntityInterface
    {
        return $this->entity;
    }
}
