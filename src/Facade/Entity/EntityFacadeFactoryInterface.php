<?php

namespace Micro\Plugin\Eav\Facade\Entity;

interface EntityFacadeFactoryInterface
{
    /**
     * @return EntityFacadeInterface
     */
    public function create(): EntityFacadeInterface;
}
