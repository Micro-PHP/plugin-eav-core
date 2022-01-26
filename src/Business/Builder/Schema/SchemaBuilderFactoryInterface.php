<?php

namespace Micro\Plugin\Eav\Business\Builder\Schema;

interface SchemaBuilderFactoryInterface
{
    /**
     * @return SchemaBuilderInterface
     */
    public function create(): SchemaBuilderInterface;
}
