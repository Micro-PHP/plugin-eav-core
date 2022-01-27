<?php

namespace Micro\Plugin\Eav\Business\Attribute\Resolver;

interface EntityAttributeResolverFactoryInterface
{
    /**
     * @return EntityAttributeResolverInterface
     */
    public function create(): EntityAttributeResolverInterface;
}
