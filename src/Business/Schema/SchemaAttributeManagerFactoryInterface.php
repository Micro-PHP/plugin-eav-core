<?php

namespace Micro\Plugin\Eav\Business\Schema;



interface SchemaAttributeManagerFactoryInterface
{
    /**
     * @return SchemaAttributeManagerInterface
     */
    public function create(): SchemaAttributeManagerInterface;
}
