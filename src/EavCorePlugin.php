<?php

namespace Micro\Plugin\Eav;

use Micro\Component\DependencyInjection\Container;
use Micro\Framework\Kernel\Plugin\AbstractPlugin;
use Micro\Plugin\Eav\Business\Attribute\AttributeFactoryInterface;
use Micro\Plugin\Eav\Business\Builder\AttributeBuilderFactory;
use Micro\Plugin\Eav\Business\Builder\AttributeBuilderFactoryInterface;
use Micro\Plugin\Eav\Business\Builder\SchemaBuilderFactory;
use Micro\Plugin\Eav\Business\Builder\SchemaBuilderFactoryInterface;
use Micro\Plugin\Eav\Business\Entity\EntityManagerFactoryInterface;
use Micro\Plugin\Eav\Business\Entity\EntityManagerProvider;
use Micro\Plugin\Eav\Business\Entity\EntityManagerProviderInterface;
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
     * @var SchemaManagerProviderInterface|null
     */
    private ?SchemaManagerProviderInterface $schemaManagerProvider = null;

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
            $this->createSchemaManagerProvider(),
            $this->createSchemaBuilderFactory()
        );
    }

    /**
     * @return SchemaManagerProviderInterface
     */
    protected function createSchemaManagerProvider(): SchemaManagerProviderInterface
    {
        if(!$this->schemaManagerProvider) {
            $this->schemaManagerProvider = new SchemaManagerProvider($this->createSchemaManagerFactory());
        }

        return $this->schemaManagerProvider;
    }

    /**
     * @return EntityManagerProviderInterface
     */
    protected function createEntityManagerProvider(): EntityManagerProviderInterface
    {
        return new EntityManagerProvider($this->createEntityManagerFactory());
    }

    /**
     * @return SchemaBuilderFactoryInterface
     */
    protected function createSchemaBuilderFactory(): SchemaBuilderFactoryInterface
    {
        return new SchemaBuilderFactory(
            $this->createSchemaManagerProvider(),
            $this->createAttributeBuilderFactory()
        );
    }

    /**
     * @return AttributeBuilderFactoryInterface
     */
    protected function createAttributeBuilderFactory(): AttributeBuilderFactoryInterface
    {
        return new AttributeBuilderFactory(
            $this->createSchemaManagerProvider(),
            $this->createAttributeFactory()
        );
    }
}
