<?php

namespace Micro\Plugin\Eav\Business\Entity\Resolver;

interface EntityResolverFactoryInterface
{
    /**
     * @return EntityResolverInterface
     */
    public function create(): EntityResolverInterface;
}
