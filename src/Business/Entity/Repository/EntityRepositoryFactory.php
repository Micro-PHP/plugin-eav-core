<?php

namespace Micro\Plugin\Eav\Business\Entity\Repository;

use Micro\Plugin\Eav\Business\Entity\Resolver\EntityResolverFactoryInterface;
use Micro\Plugin\Eav\Business\Entity\Resolver\EntitySchemaResolverFactoryInterface;
use Micro\Plugin\Eav\Business\Schema\Resolver\SchemaResolverFactoryInterface;
use phpseclib3\Common\Functions\Strings;

class EntityRepositoryFactory implements EntityRepositoryFactoryInterface
{
    /**
     * @param SchemaResolverFactoryInterface $schemaResolverFactory
     * @param EntityResolverFactoryInterface $entityResolverFactory
     */
    public function __construct(
    private SchemaResolverFactoryInterface $schemaResolverFactory,
    private EntityResolverFactoryInterface $entityResolverFactory
    )
    {
    }

    /**
     * @return EntityRepository
     */
    public function create(string $schemaName): EntityRepositoryInterface
    {
        return new EntityRepository(
            $this->schemaResolverFactory->create(),
            $this->entityResolverFactory->create(),
            $schemaName,
        );
    }
}
