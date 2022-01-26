<?php

namespace Micro\Plugin\Eav\Business\Entity;

class EntityManagerProvider implements EntityManagerProviderInterface
{
    /**
     * @var EntityManagerInterface|null
     */
    private ?EntityManagerInterface $entityManager;

    /**
     * @param EntityManagerFactoryInterface $entityManagerFactory
     */
    public function __construct(private EntityManagerFactoryInterface $entityManagerFactory)
    {
        $this->entityManager = null;
    }

    /**
     * @return EntityManagerInterface
     */
    public function getManager(): EntityManagerInterface
    {
        if($this->entityManager === null) {
            $this->entityManager = $this->entityManagerFactory->create();
        }

        return $this->entityManager;
    }
}
