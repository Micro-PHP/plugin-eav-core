<?php

namespace Micro\Plugin\Eav\Business\Schema;



interface SchemaManagerFactoryInterface
{
    /**
     * @return SchemaManagerInterface
     */
    public function create(): SchemaManagerInterface;
}
