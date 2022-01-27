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
    public function resolve(SchemaInterface $schema, int $id): EntityInterface;
}
