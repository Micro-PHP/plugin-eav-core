<?php

namespace Micro\Plugin\Eav\Business\Entity;

interface EntityManagerFactoryInterface
{
    /**
     * @return EntityManagerInterface
     */
    public function create(): EntityManagerInterface;
}
