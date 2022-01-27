<?php

namespace Micro\Plugin\Eav\Business\Entity\Repository;


use Micro\Plugin\Eav\Business\Entity\Resolver\EntityResolverInterface;
use Micro\Plugin\Eav\Business\Schema\Resolver\SchemaResolverInterface;
use Micro\Plugin\Eav\Entity\Entity\EntityInterface;
use Micro\Plugin\Eav\Entity\Schema\SchemaInterface;
use Micro\Plugin\Eav\Exception\SchemaNotFoundException;

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
    public function find(string $id): EntityInterface
    {
        $schema = $this->lookupSchema();

        return $this->entityResolver->resolve($schema, $id);
    }

    /**
     * @return SchemaInterface
     *
     * @throws SchemaNotFoundException
     */
    protected function lookupSchema(): SchemaInterface
    {
        $schema = $this->schemaResolver->resolve($this->schemaName);
        if(!$schema) {
            throw new SchemaNotFoundException();
        }

        return $schema;
    }

    /**
     * {@inheritDoc}
     */
    public function list(int $count = null, string $offsetId = null): iterable
    {
        $schema = $this->lookupSchema();

        return $this->entityResolver->resolveList($schema, $count, $offsetId);
    }

    /**
     * {@inheritDoc}
     */
    public function count(): int
    {
        $schema = $this->lookupSchema();

        return $this->entityResolver->count($schema);
    }
}
