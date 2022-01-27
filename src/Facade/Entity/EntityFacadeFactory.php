<?php

namespace Micro\Plugin\Eav\Facade\Entity;

class EntityFacadeFactory implements EntityFacadeFactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function create(): EntityFacadeInterface
    {
        return new EntityFacade();
    }
}
