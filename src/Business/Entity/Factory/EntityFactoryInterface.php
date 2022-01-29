<?php

namespace Micro\Plugin\Eav\Business\Entity\Factory;

use Micro\Plugin\Eav\Entity\Entity\EntityInterface;
use Micro\Plugin\Eav\Entity\Schema\SchemaInterface;

interface EntityFactoryInterface
{
    /**
     * @param SchemaInterface $schema
     *
     * @return EntityInterface
     */
    public function create(SchemaInterface $schema): EntityInterface;
}
