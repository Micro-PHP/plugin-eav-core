<?php

namespace Micro\Plugin\Eav\Facade\Schema;

use Micro\Plugin\Eav\Business\Builder\Schema\SchemaBuilderInterface;
use Micro\Plugin\Eav\Entity\Schema\SchemaInterface;

interface SchemaFacadeInterface
{
    /**
     * @param SchemaInterface $schema
     *
     * @return void
     */
    public function save(SchemaInterface $schema): void;

    /**
     * @param SchemaInterface $schema
     *
     * @return void
     */
    public function remove(SchemaInterface $schema): void;

    /**
     * @return SchemaBuilderInterface
     */
    public function createBuilder(): SchemaBuilderInterface;
}
