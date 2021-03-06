<?php

namespace Micro\Plugin\Eav\Facade\Entity;

use Micro\Plugin\Eav\Business\Entity\Builder\EntityBuilderFactoryInterface;
use Micro\Plugin\Eav\Business\Entity\Builder\EntityBuilderInterface;
use Micro\Plugin\Eav\Business\Entity\Manager\EntityObjectManagerFactoryInterface;
use Micro\Plugin\Eav\Business\Entity\Repository\EntityRepositoryFactoryInterface;
use Micro\Plugin\Eav\Business\Value\Get\ValueObjectGetFactoryInterface;
use Micro\Plugin\Eav\Entity\Entity\EntityInterface;
use Micro\Plugin\Eav\Event\EntityCreateEvent;
use Micro\Plugin\Eav\Event\EntityDeleteEvent;
use Micro\Plugin\Eav\Event\EntityUpdateEvent;
use Micro\Plugin\EventEmitter\EventsFacadeInterface;

/**
 * TODO: Entity events implementation. Basic implementation now
 */
class EntityFacade implements EntityFacadeInterface
{
    /**
     * @param EntityObjectManagerFactoryInterface $entityObjectManagerFactory
     * @param EntityRepositoryFactoryInterface $entityRepositoryFactory
     * @param EntityBuilderFactoryInterface $entityBuilderFactory
     * @param ValueObjectGetFactoryInterface $valueObjectGetFactory
     * @param EventsFacadeInterface $eventFacade
     */
    public function __construct(
    private EntityObjectManagerFactoryInterface $entityObjectManagerFactory,
    private EntityRepositoryFactoryInterface $entityRepositoryFactory,
    private EntityBuilderFactoryInterface $entityBuilderFactory,
    private ValueObjectGetFactoryInterface $valueObjectGetFactory,
    private EventsFacadeInterface $eventFacade
    )
    {
    }

    /**
     * {@inheritDoc}
     */
    public function save(EntityInterface $entity): void
    {
        $eventClass = $entity->getId() === null ?
            EntityCreateEvent::class :
            EntityUpdateEvent::class;

        $this->entityObjectManagerFactory
            ->create()
            ->save($entity);

        $this->eventFacade->emit(new $eventClass($entity));
    }

    /**
     * {@inheritDoc}
     */
    public function remove(EntityInterface $entity): void
    {
        $this->entityObjectManagerFactory
            ->create()
            ->remove($entity);

        $this->eventFacade->emit(new EntityDeleteEvent($entity));
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

    /**
     * {@inheritDoc}
     */
    public function createBuilder(EntityInterface $entity = null): EntityBuilderInterface
    {
        return $this->entityBuilderFactory->create($entity);
    }

    /**
     * {@inheritDoc}
     */
    public function getValue(EntityInterface $entity, string $attributeName): mixed
    {
        return $this->valueObjectGetFactory
            ->create($entity, $attributeName)
            ->get()
            ->getValue();
    }
}
