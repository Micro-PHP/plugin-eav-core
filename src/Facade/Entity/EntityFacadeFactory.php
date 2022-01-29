<?php

namespace Micro\Plugin\Eav\Facade\Entity;

use Micro\Plugin\Eav\Business\Entity\Builder\EntityBuilderFactoryInterface;
use Micro\Plugin\Eav\Business\Entity\Manager\EntityObjectManagerFactoryInterface;
use Micro\Plugin\Eav\Business\Entity\Repository\EntityRepositoryFactoryInterface;
use Micro\Plugin\Eav\Business\Value\Get\ValueObjectGetFactoryInterface;

class EntityFacadeFactory implements EntityFacadeFactoryInterface
{
    /**
     * @param EntityObjectManagerFactoryInterface $entityObjectManagerFactory
     * @param EntityRepositoryFactoryInterface $entityRepositoryFactory
     * @param EntityBuilderFactoryInterface $entityBuilderFactory
     */
    public function __construct(
        private EntityObjectManagerFactoryInterface $entityObjectManagerFactory,
        private EntityRepositoryFactoryInterface $entityRepositoryFactory,
        private EntityBuilderFactoryInterface $entityBuilderFactory,
        private ValueObjectGetFactoryInterface $valueObjectGetFactory
    )
    {
    }

    /**
     * {@inheritDoc}
     */
    public function create(): EntityFacadeInterface
    {
        return new EntityFacade(
            $this->entityObjectManagerFactory,
            $this->entityRepositoryFactory,
            $this->entityBuilderFactory,
            $this->valueObjectGetFactory
        );
    }
}
