<?php

namespace Micro\Plugin\Eav\Business\Entity;

interface EntityManagerProviderInterface
{
    /**
     * @return EntityManagerInterface
     */
    public function getManager(): EntityManagerInterface;
}
