<?php

namespace Micro\Plugin\Eav\Facade\Entity;

use Micro\Plugin\Eav\Business\Entity\Manager\EntityObjectManagerFactoryInterface;
use Micro\Plugin\Eav\Business\Entity\Repository\EntityRepositoryFactoryInterface;
use Micro\Plugin\Eav\Entity\Entity\EntityInterface;

class EntityFacade implements EntityFacadeInterface
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
    public function save(EntityInterface $entity): void
    {
        $this->entityObjectManagerFactory
            ->create()
            ->save($entity);
    }

    /**
     * {@inheritDoc}
     */
    public function remove(EntityInterface $entity): void
    {
        $this->entityObjectManagerFactory
            ->create()
            ->remove($entity);
    }

    /**
     * {@inheritDoc}
     */
    public function list(string $schemaName, int $count = null, string $offsetId = null): iterable
    {
        return $this->entityRepositoryFactory
            ->create($schemaName)
            ->list($count, $offsetId);
    }

    /**
     * {@inheritDoc}
     */
    public function count(string $schemaName): int
    {
        return $this->entityRepositoryFactory
            ->create($schemaName)
            ->count();
    }

    /**
     * {@inheritDoc}
     */
    public function find(string $schemaName, string $id): ?EntityInterface
    {
        return $this->entityRepositoryFactory
            ->create($schemaName)
            ->find($id);
    }
}
