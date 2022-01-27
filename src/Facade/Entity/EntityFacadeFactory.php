<?php

namespace Micro\Plugin\Eav\Facade\Entity;

use Micro\Plugin\Eav\Business\Entity\Manager\EntityObjectManagerFactoryInterface;
use Micro\Plugin\Eav\Business\Entity\Repository\EntityRepositoryFactoryInterface;

class EntityFacadeFactory implements EntityFacadeFactoryInterface
{
    /**
     * @param EntityObjectManagerFactoryInterface $entityObjectManagerFactory
     * @param EntityRepositoryFactoryInterface $entityRepositoryFactory
     */
    public function __construct(
        private EntityObjectManagerFactoryInterface $entityObjectManagerFactory,
        private EntityRepositoryFactoryInterface $entityRepositoryFactory
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
            $this->entityRepositoryFactory
        );
    }
}
