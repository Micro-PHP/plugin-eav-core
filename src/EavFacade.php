<?php

namespace Micro\Plugin\Eav;

use Micro\Plugin\Eav\Entity\Entity\EntityInterface;
use Micro\Plugin\Eav\Facade\Entity\EntityFacadeFactoryInterface;
use Micro\Plugin\Eav\Facade\Entity\EntityFacadeInterface;
use Micro\Plugin\Eav\Facade\Schema\SchemaFacadeFactoryInterface;
use Micro\Plugin\Eav\Facade\Schema\SchemaFacadeInterface;

class EavFacade implements EavFacadeInterface
{
    /**
     * @param SchemaFacadeFactoryInterface $schemaFacadeFactory
     * @param EntityFacadeFactoryInterface $entityFacadeFactory
     */
    public function __construct(
    private SchemaFacadeFactoryInterface $schemaFacadeFactory,
    private EntityFacadeFactoryInterface $entityFacadeFactory
    )
    {
    }

    /**
     * {@inheritDoc}
     */
    public function schema(): SchemaFacadeInterface
    {
        return $this->schemaFacadeFactory->create();
    }

    /**
     * {@inheritDoc}
     */
    public function entity(): EntityFacadeInterface
    {
        return $this->entityFacadeFactory->create();
    }
}
