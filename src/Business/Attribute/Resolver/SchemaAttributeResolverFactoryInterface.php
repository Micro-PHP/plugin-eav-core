<?php

namespace Micro\Plugin\Eav\Business\Attribute\Resolver;

interface SchemaAttributeResolverFactoryInterface
{
    /**
     * @return SchemaAttributeResolverInterface
     */
    public function create(): SchemaAttributeResolverInterface;
}
