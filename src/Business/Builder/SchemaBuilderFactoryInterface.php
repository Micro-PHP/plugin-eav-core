<?php

namespace Micro\Plugin\Eav\Business\Builder;

interface SchemaBuilderFactoryInterface
{
    /**
     * @return SchemaBuilderInterface
     */
    public function create(): SchemaBuilderInterface;
}
