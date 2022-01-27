<?php

namespace Micro\Plugin\Eav\Business\Schema\Repository;

use Micro\Plugin\Eav\Business\Attribute\Resolver\SchemaAttributeResolverFactoryInterface;
use Micro\Plugin\Eav\Business\Schema\Resolver\SchemaResolverFactoryInterface;


class SchemaAttributeRepositoryFactory implements SchemaAttributeRepositoryFactoryInterface
{
    /**
     * @param SchemaResolverFactoryInterface $schemaResolverFactory
     * @param SchemaAttributeResolverFactoryInterface $schemaAttributeResolverFactory
     */
    public function __construct(
        private SchemaResolverFactoryInterface $schemaResolverFactory,
        private SchemaAttributeResolverFactoryInterface $schemaAttributeResolverFactory
    ) {}

    /**
     * @param string $schemaName
     *
     * @return SchemaAttributeRepository
     */
    public function create(string $schemaName): SchemaAttributeRepositoryInterface
    {
        return new SchemaAttributeRepository(
            $this->schemaResolverFactory->create(),
            $this->schemaAttributeResolverFactory->create(),
            $schemaName
        );
    }
}
