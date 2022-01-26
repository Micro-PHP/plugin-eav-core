<?php

namespace Micro\Plugin\Eav\Business\Entity\Manager;

interface EntityManagerFactoryInterface
{
    /**
     * @return EntityManagerInterface
     */
    public function create(): EntityManagerInterface;
}
