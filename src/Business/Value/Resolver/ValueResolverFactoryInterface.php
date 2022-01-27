<?php

namespace Micro\Plugin\Eav\Business\Value\Resolver;

interface ValueResolverFactoryInterface
{
    /**
     * @return ValueResolverInterface
     */
    public function create(): ValueResolverInterface;
}
