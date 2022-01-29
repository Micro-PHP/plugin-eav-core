<?php

namespace Micro\Plugin\Eav\Business\Schema\Factory;

use Micro\Plugin\Eav\Entity\Schema\SchemaInterface;

interface SchemaFactoryInterface
{
    /**
     * @param string $schemaName
     *
     * @return SchemaInterface
     */
    public function create(string $schemaName): SchemaInterface;
}
