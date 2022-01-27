<?php

namespace Micro\Plugin\Eav\Business\Schema\Resolver;

interface SchemaResolverFactoryInterface
{
    /**
     * @return SchemaResolverInterface
     */
    public function create(): SchemaResolverInterface;
}
