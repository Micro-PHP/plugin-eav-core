<?php

namespace Micro\Plugin\Eav\Business\Entity\Resolver;

use Micro\Plugin\Eav\Entity\Entity\EntityInterface;
use Micro\Plugin\Eav\Entity\Schema\SchemaInterface;

interface EntityResolverInterface
{
    /**
     * @param SchemaInterface $schema
     * @param int $id
     *
     * @return EntityInterface
     */
    public function resolve(SchemaInterface $schema, string $id): EntityInterface;

    /**
     * @param SchemaInterface $schema
     * @param int|null $count
     * @param string|null $offsetId
     * @return iterable
     */
    public function resolveList(SchemaInterface $schema, int $count = null, string $offsetId = null): iterable;

    /**
     * @param SchemaInterface $schema
     * @return int
     */
    public function count(SchemaInterface $schema): int;
}
