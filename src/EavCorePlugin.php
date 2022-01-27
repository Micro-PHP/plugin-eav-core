<?php

namespace Micro\Plugin\Eav;

use Micro\Component\DependencyInjection\Container;
use Micro\Framework\Kernel\Plugin\AbstractPlugin;
use Micro\Plugin\Eav\Business\Attribute\AttributeFactoryInterface;
use Micro\Plugin\Eav\Business\Builder\Attribute\AttributeBuilderFactory;
use Micro\Plugin\Eav\Business\Builder\Attribute\AttributeBuilderFactoryInterface;
use Micro\Plugin\Eav\Business\Builder\Schema\SchemaBuilderFactory;
use Micro\Plugin\Eav\Business\Builder\Schema\SchemaBuilderFactoryInterface;
use Micro\Plugin\Eav\Business\Entity\Manager\EntityObjectManagerFactoryInterface;
use Micro\Plugin\Eav\Business\Entity\Repository\EntityRepositoryFactory;
use Micro\Plugin\Eav\Business\Entity\Repository\EntityRepositoryFactoryInterface;
use Micro\Plugin\Eav\Business\Entity\Resolver\EntityResolverFactoryInterface;
use Micro\Plugin\Eav\Business\Schema\Manager\SchemaObjectManagerFactoryInterface;
use Micro\Plugin\Eav\Business\Schema\Resolver\SchemaResolverFactoryInterface;
use Micro\Plugin\Eav\Business\Schema\SchemaAttributeManagerFactoryInterface;
use Micro\Plugin\Eav\Facade\Entity\EntityFacadeFactory;
use Micro\Plugin\Eav\Facade\Entity\EntityFacadeFactoryInterface;
use Micro\Plugin\Eav\Facade\Schema\SchemaFacadeFactory;
use Micro\Plugin\Eav\Facade\Schema\SchemaFacadeFactoryInterface;

abstract class EavCorePlugin extends AbstractPlugin
{
    /**
     * @var Container
     */
    protected Container $container;

    /**
     * @return SchemaAttributeManagerFactoryInterface
     */
    abstract protected function createSchemaAttributeManagerFactory(): SchemaAttributeManagerFactoryInterface;

    /**
     * @return AttributeFactoryInterface
     */
    abstract protected function createAttributeFactory(): AttributeFactoryInterface;

    /**
     * @return SchemaResolverFactoryInterface
     */
    abstract protected function createSchemaResolverFactory(): SchemaResolverFactoryInterface;

    /**
     * @return SchemaObjectManagerFactoryInterface
     */
    abstract protected function createSchemaObjectManagerFactory(): SchemaObjectManagerFactoryInterface;

    /**
     * @return EntityObjectManagerFactoryInterface
     */
    abstract protected function createEntityObjectManagerFactory(): EntityObjectManagerFactoryInterface;

    /**
     * @return EntityResolverFactoryInterface
     */
    abstract protected function createEntityResolverFactory(): EntityResolverFactoryInterface;

    /**
     * {@inheritDoc}
     */
    public function provideDependencies(Container $container): void
    {
        $this->container = $container;

        $container->register(EavFacadeInterface::class, function (Container $container) {
            return $this->createFacade();
        });
    }

    /**
     * @return EavFacadeInterface
     */
    protected function createFacade(): EavFacadeInterface
    {
        return new EavFacade(
            $this->createSchemaFacadeFactory(),
            $this->createEntityFacadeFactory()
        );
    }

    /**
     * @return SchemaFacadeFactoryInterface
     */
    protected function createSchemaFacadeFactory(): SchemaFacadeFactoryInterface
    {
        return new SchemaFacadeFactory(
            $this->createSchemaBuilderFactory(),
            $this->createSchemaObjectManagerFactory()
        );
    }

    /**
     * @return EntityFacadeFactoryInterface
     */
    protected function createEntityFacadeFactory(): EntityFacadeFactoryInterface
    {
        return new EntityFacadeFactory(
            $this->createEntityObjectManagerFactory(),
            $this->createEntityRepositoryFactory()
        );
    }

    /**
     * @return EntityRepositoryFactoryInterface
     */
    protected function createEntityRepositoryFactory(): EntityRepositoryFactoryInterface
    {
        return new EntityRepositoryFactory(
            $this->createSchemaResolverFactory(),
            $this->createEntityResolverFactory()
        );
    }

    /**
     * @return SchemaBuilderFactoryInterface
     */
    protected function createSchemaBuilderFactory(): SchemaBuilderFactoryInterface
    {
        return new SchemaBuilderFactory(
            $this->createSchemaResolverFactory(),
            $this->createAttributeBuilderFactory()
        );
    }

    /**
     * @return AttributeBuilderFactoryInterface
     */
    protected function createAttributeBuilderFactory(): AttributeBuilderFactoryInterface
    {
        return new AttributeBuilderFactory(
            $this->createSchemaAttributeManagerFactory(),
            $this->createAttributeFactory()
        );
    }
}
