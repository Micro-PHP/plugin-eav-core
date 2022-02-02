<?php

namespace Micro\Plugin\Eav\Facade\Schema;

use Micro\Plugin\Eav\Business\Builder\Schema\SchemaBuilderFactoryInterface;
use Micro\Plugin\Eav\Business\Builder\Schema\SchemaBuilderInterface;
use Micro\Plugin\Eav\Business\Schema\Manager\SchemaObjectManagerFactoryInterface;
use Micro\Plugin\Eav\Entity\Schema\SchemaInterface;

class SchemaFacade implements SchemaFacadeInterface
{
    /**
     * @param SchemaBuilderFactoryInterface $schemaBuilderFactory
     * @param SchemaObjectManagerFactoryInterface $schemaObjectManagerFactory
     */
    public function __construct(
    private SchemaBuilderFactoryInterface $schemaBuilderFactory,
    private SchemaObjectManagerFactoryInterface $schemaObjectManagerFactory
    )
    {
    }

    /**
     * {@inheritDoc}
     */
    public function save(SchemaInterface $schema): void
    {
        $this->schemaObjectManagerFactory->create()->save($schema);
    }

    /**
     * {@inheritDoc}
     */
    public function remove(SchemaInterface $schema): void
    {
        $this->schemaObjectManagerFactory->create()->remove($schema);
    }

    /**
     * {@inheritDoc}
     */
    public function createBuilder(): SchemaBuilderInterface
    {
        return $this->schemaBuilderFactory->create();
    }
}
