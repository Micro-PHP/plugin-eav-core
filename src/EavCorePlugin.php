<?php

namespace Micro\Plugin\Eav;

use Micro\Component\DependencyInjection\Container;
use Micro\Framework\Kernel\Plugin\AbstractPlugin;
use Micro\Plugin\Eav\Business\Attribute\AttributeFactoryInterface;
use Micro\Plugin\Eav\Business\Builder\Attribute\AttributeBuilderFactory;
use Micro\Plugin\Eav\Business\Builder\Attribute\AttributeBuilderFactoryInterface;
use Micro\Plugin\Eav\Business\Builder\Schema\SchemaBuilderFactory;
use Micro\Plugin\Eav\Business\Builder\Schema\SchemaBuilderFactoryInterface;
use Micro\Plugin\Eav\Business\Entity\Manager\EntityManagerFactoryInterface;
use Micro\Plugin\Eav\Business\Entity\Manager\EntityManagerProvider;
use Micro\Plugin\Eav\Business\Entity\Manager\EntityManagerProviderInterface;
use Micro\Plugin\Eav\Business\Schema\SchemaManagerFactoryInterface;
use Micro\Plugin\Eav\Business\Schema\SchemaManagerProvider;
use Micro\Plugin\Eav\Business\Schema\SchemaManagerProviderInterface;

abstract class EavCorePlugin extends AbstractPlugin
{
    /**
     * @var Container
     */
    protected Container $container;

    /**
     * @return SchemaManagerFactoryInterface
     */
    abstract protected function createSchemaManagerFactory(): SchemaManagerFactoryInterface;

    /**
     * @return EntityManagerFactoryInterface
     */
    abstract protected function createEntityManagerFactory(): EntityManagerFactoryInterface;

    /**
     * @return AttributeFactoryInterface
     */
    abstract protected function createAttributeFactory(): AttributeFactoryInterface;

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
            $this->createSchemaManagerFactory(),
            $this->createSchemaBuilderFactory()
        );
    }

    /**
     * @return SchemaBuilderFactoryInterface
     */
    protected function createSchemaBuilderFactory(): SchemaBuilderFactoryInterface
    {
        return new SchemaBuilderFactory(
            $this->createSchemaManagerFactory(),
            $this->createAttributeBuilderFactory()
        );
    }

    /**
     * @return AttributeBuilderFactoryInterface
     */
    protected function createAttributeBuilderFactory(): AttributeBuilderFactoryInterface
    {
        return new AttributeBuilderFactory(
            $this->createSchemaManagerFactory(),
            $this->createAttributeFactory()
        );
    }
}
