<?php

namespace Micro\Plugin\Eav\Business\Entity\Repository;


use Micro\Plugin\Eav\Business\Entity\Resolver\EntityResolverInterface;
use Micro\Plugin\Eav\Business\Schema\Resolver\SchemaResolverInterface;
use Micro\Plugin\Eav\Entity\Entity\EntityInterface;
use Micro\Plugin\Eav\Entity\Schema\SchemaInterface;

class EntityRepository implements EntityRepositoryInterface
{
    /**
     * @param SchemaResolverInterface $schemaResolver
     * @param EntityResolverInterface $entityResolver
     * @param string $schemaName
     */
    public function __construct(
        private SchemaResolverInterface $schemaResolver,
        private EntityResolverInterface $entityResolver,
        private string $schemaName
    ) {}

    /**
     * {@inheritDoc}
     */
    public function findById(int $id): EntityInterface
    {
        $schema = $this->lookupSchema();

        return $this->entityResolver->resolve($schema, $id);
    }

    protected function lookupSchema(): SchemaInterface|null
    {
        return $this->schemaResolver->resolve($this->schemaName);
    }

    /**
     * {@inheritDoc}
     */
    public function list(int $count = null, int $offsetId = null): iterable
    {
    }

    /**
     * {@inheritDoc}
     */
    public function count(): int
    {
    }
}
