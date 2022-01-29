<?php

namespace Micro\Plugin\Eav;

use Micro\Component\DependencyInjection\Container;
use Micro\Framework\Kernel\Plugin\AbstractPlugin;
use Micro\Plugin\Eav\Business\Attribute\AttributeFactoryInterface;
use Micro\Plugin\Eav\Business\Attribute\Resolver\EntityAttributeResolverFactoryInterface;
use Micro\Plugin\Eav\Business\Builder\Attribute\AttributeBuilderFactory;
use Micro\Plugin\Eav\Business\Builder\Attribute\AttributeBuilderFactoryInterface;
use Micro\Plugin\Eav\Business\Builder\Schema\SchemaBuilderFactory;
use Micro\Plugin\Eav\Business\Builder\Schema\SchemaBuilderFactoryInterface;
use Micro\Plugin\Eav\Business\Entity\Builder\EntityBuilderFactory;
use Micro\Plugin\Eav\Business\Entity\Builder\EntityBuilderFactoryInterface;
use Micro\Plugin\Eav\Business\Entity\Factory\EntityFactoryInterface;
use Micro\Plugin\Eav\Business\Entity\Manager\EntityObjectManagerFactoryInterface;
use Micro\Plugin\Eav\Business\Entity\Repository\EntityRepositoryFactory;
use Micro\Plugin\Eav\Business\Entity\Repository\EntityRepositoryFactoryInterface;
use Micro\Plugin\Eav\Business\Entity\Resolver\EntityResolverFactoryInterface;
use Micro\Plugin\Eav\Business\Schema\Factory\SchemaFactoryInterface;
use Micro\Plugin\Eav\Business\Schema\Manager\SchemaObjectManagerFactoryInterface;
use Micro\Plugin\Eav\Business\Schema\Resolver\SchemaResolverFactoryInterface;
use Micro\Plugin\Eav\Business\Schema\SchemaAttributeManagerFactoryInterface;
use Micro\Plugin\Eav\Business\Value\Get\ValueObjectGetFactoryInterface;
use Micro\Plugin\Eav\Business\Value\Resolver\ValueResolverFactoryInterface;
use Micro\Plugin\Eav\Business\Value\Set\ValueObjectSetFactoryInterface;
use Micro\Plugin\Eav\Business\Value\Typehint\Converter\BooleanTypehintConverter;
use Micro\Plugin\Eav\Business\Value\Typehint\Converter\DateTimeTypehintConverter;
use Micro\Plugin\Eav\Business\Value\Typehint\Converter\FloatTypehintConverter;
use Micro\Plugin\Eav\Business\Value\Typehint\Converter\IntegerTypehintConverter;
use Micro\Plugin\Eav\Business\Value\Typehint\Converter\StringTypehintConverter;
use Micro\Plugin\Eav\Business\Value\Typehint\ValueTypehintConverterFactory;
use Micro\Plugin\Eav\Business\Value\Typehint\ValueTypehintConverterFactoryInterface;
use Micro\Plugin\Eav\Business\Value\Unique\EntityAttributeUniqueGeneratorFactoryInterface;
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
     * @return AttributeFactoryInterface
     */
    abstract protected function createAttributeFactory(): AttributeFactoryInterface;

    /**
     * @return SchemaFactoryInterface
     */
    abstract protected function createSchemaFactory(): SchemaFactoryInterface;

    /**
     * @return SchemaResolverFactoryInterface
     */
    abstract protected function createSchemaResolverFactory(): SchemaResolverFactoryInterface;

    /**
     * @return SchemaObjectManagerFactoryInterface
     */
    abstract protected function createSchemaObjectManagerFactory(): SchemaObjectManagerFactoryInterface;

    /**
     * @return SchemaAttributeManagerFactoryInterface
     */
    abstract protected function createSchemaAttributeManagerFactory(): SchemaAttributeManagerFactoryInterface;

    /**
     * @return EntityObjectManagerFactoryInterface
     */
    abstract protected function createEntityObjectManagerFactory(): EntityObjectManagerFactoryInterface;

    /**
     * @return EntityFactoryInterface
     */
    abstract protected function createEntityFactory(): EntityFactoryInterface;

    /**
     * @return EntityResolverFactoryInterface
     */
    abstract protected function createEntityResolverFactory(): EntityResolverFactoryInterface;

    /**
     * @return EntityAttributeResolverFactoryInterface
     */
    abstract protected function createEntityAttributeResolverFactory(): EntityAttributeResolverFactoryInterface;

    /**
     * @return ValueResolverFactoryInterface
     */
    abstract protected function createValueResolverFactory(): ValueResolverFactoryInterface;

    /**
     * @return ValueObjectSetFactoryInterface
     */
    abstract protected function createValueObjectSetFactory(): ValueObjectSetFactoryInterface;

    /**
     * @return EntityAttributeUniqueGeneratorFactoryInterface
     */
    abstract protected function createEntityAttributeUniqueGeneratorFactory(): EntityAttributeUniqueGeneratorFactoryInterface;

    /**
     * @return ValueObjectGetFactoryInterface
     */
    abstract protected function createValueObjectGetFactory(): ValueObjectGetFactoryInterface;

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
     * @return iterable
     */
    protected function createTypehintConverterClassCollection(): iterable
    {
        return [
            BooleanTypehintConverter::class,
            StringTypehintConverter::class,
            FloatTypehintConverter::class,
            IntegerTypehintConverter::class,
            DateTimeTypehintConverter::class,
        ];
    }

    /**
     * @return ValueTypehintConverterFactoryInterface
     */
    protected function createValueTypehintConverterFactory(): ValueTypehintConverterFactoryInterface
    {
        return new ValueTypehintConverterFactory($this->createTypehintConverterClassCollection());
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
            $this->createEntityRepositoryFactory(),
            $this->createEntityBuilderFactory(),
            $this->createValueObjectGetFactory()
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
     * @return EntityBuilderFactoryInterface
     */
    protected function createEntityBuilderFactory(): EntityBuilderFactoryInterface
    {
        return new EntityBuilderFactory(
            $this->createEntityAttributeResolverFactory(),
            $this->createSchemaResolverFactory(),
            $this->createValueResolverFactory(),
            $this->createValueObjectSetFactory(),
            $this->createValueTypehintConverterFactory(),
            $this->createEntityAttributeUniqueGeneratorFactory(),
            $this->createEntityFactory()
        );
    }

    /**
     * @return SchemaBuilderFactoryInterface
     */
    protected function createSchemaBuilderFactory(): SchemaBuilderFactoryInterface
    {
        return new SchemaBuilderFactory(
            $this->createSchemaResolverFactory(),
            $this->createSchemaFactory(),
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
