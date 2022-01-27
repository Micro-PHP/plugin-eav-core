<?php

namespace Micro\Plugin\Eav\Facade\Schema;

interface SchemaFacadeFactoryInterface
{
    /**
     * @return SchemaFacadeInterface
     */
    public function create(): SchemaFacadeInterface;
}
