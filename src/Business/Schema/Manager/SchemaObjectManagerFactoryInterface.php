<?php

namespace Micro\Plugin\Eav\Business\Schema\Manager;

interface SchemaObjectManagerFactoryInterface
{
    /**
     * @return SchemaObjectManagerInterface
     */
    public function create(): SchemaObjectManagerInterface;
}
