<?php

namespace Micro\Plugin\Eav\Business\Schema\Repository;

use Micro\Plugin\Eav\Business\Attribute\Resolver\SchemaAttributeResolverInterface;
use Micro\Plugin\Eav\Business\Schema\Resolver\SchemaResolverInterface;
use Micro\Plugin\Eav\Entity\Attribute\AttributeInterface;
use Micro\Plugin\Eav\Entity\Schema\SchemaInterface;

class SchemaAttributeRepository implements SchemaAttributeRepositoryInterface
{
    /**
     * @param SchemaResolverInterface $schemaResolver
     * @param SchemaAttributeResolverInterface $schemaAttributeResolver
     */
    public function __construct(
    private SchemaResolverInterface $schemaResolver,
    private SchemaAttributeResolverInterface $schemaAttributeResolver,
    private string $schemaName
    )
    {
    }

    /**
     * {@inheritDoc}
     */
    public function getAttribute(string $attributeName): AttributeInterface
    {
        return $this->schemaAttributeResolver->resolveAttribute(
            $this->lookupSchema(),
            $attributeName
        );
    }

    /**
     * {@inheritDoc}
     */
    public function getAttributes(): iterable
    {
        return $this->schemaAttributeResolver->resolveAttributes($this->lookupSchema());
    }

    protected function lookupSchema(): SchemaInterface|null
    {
        return $this->schemaResolver->resolve($this->schemaName);
    }
}
