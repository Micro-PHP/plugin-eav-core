<?php

namespace Micro\Plugin\Eav\Business\Entity\Manager;

interface EntityObjectManagerFactoryInterface
{
    /**
     * @return EntityObjectManagerInterface
     */
    public function create(): EntityObjectManagerInterface;
}
