<?php

namespace Micro\Plugin\Eav\Business\Schema;

interface SchemaManagerProviderInterface
{
    /**
     * @return SchemaManagerInterface
     */
    public function getManager(): SchemaManagerInterface;
}
