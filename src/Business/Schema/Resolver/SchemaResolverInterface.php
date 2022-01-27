<?php

namespace Micro\Plugin\Eav\Business\Schema\Resolver;

use Micro\Plugin\Eav\Entity\Schema\SchemaInterface;

interface SchemaResolverInterface
{
    /**
     * @param string $schemaName
     *
     * @return SchemaInterface|null
     */
    public function resolve(string $schemaName): ?SchemaInterface;

    /**
     * @param string $schemaName
     *
     * @return SchemaInterface
     */
    public function create(string $schemaName): SchemaInterface;
}
