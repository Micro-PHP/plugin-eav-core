<?php

namespace Micro\Plugin\Eav\Business\Entity\Builder;

use Micro\Plugin\Eav\Business\Attribute\Resolver\EntityAttributeResolverFactoryInterface;
use Micro\Plugin\Eav\Business\Entity\Factory\EntityFactoryInterface;
use Micro\Plugin\Eav\Business\Schema\Resolver\SchemaResolverFactoryInterface;
use Micro\Plugin\Eav\Business\Value\Resolver\ValueResolverFactoryInterface;
use Micro\Plugin\Eav\Business\Value\Set\ValueObjectSetFactoryInterface;
use Micro\Plugin\Eav\Business\Value\Typehint\ValueTypehintConverterFactoryInterface;
use Micro\Plugin\Eav\Business\Value\Unique\EntityAttributeUniqueGeneratorFactoryInterface;
use Micro\Plugin\Eav\Entity\Entity\EntityInterface;

class EntityBuilderFactory implements EntityBuilderFactoryInterface
{
    /**
     * @param EntityAttributeResolverFactoryInterface $entityAttributeResolverFactory
     * @param SchemaResolverFactoryInterface $schemaResolverFactory
     * @param ValueResolverFactoryInterface $valueResolverFactory
     * @param ValueObjectSetFactoryInterface $valueObjectSetFactory
     * @param ValueTypehintConverterFactoryInterface $valueTypehintConverterFactory
     * @param EntityFactoryInterface $entityFactory
     */
    public function __construct(
        private EntityAttributeResolverFactoryInterface        $entityAttributeResolverFactory,
        private SchemaResolverFactoryInterface                 $schemaResolverFactory,
        private ValueResolverFactoryInterface                  $valueResolverFactory,
        private ValueObjectSetFactoryInterface                 $valueObjectSetFactory,
        private ValueTypehintConverterFactoryInterface         $valueTypehintConverterFactory,
        private EntityAttributeUniqueGeneratorFactoryInterface $entityAttributeUniqueGeneratorFactory,
        private EntityFactoryInterface                         $entityFactory
    )
    {}

    /**
     * {@inheritDoc}
     */
    public function create(EntityInterface $entity = null): EntityBuilderInterface
    {
        return new EntityBuilder(
            $this->entityAttributeResolverFactory,
            $this->schemaResolverFactory,
            $this->valueResolverFactory,
            $this->valueObjectSetFactory,
            $this->valueTypehintConverterFactory,
            $this->entityFactory,
            $this->entityAttributeUniqueGeneratorFactory,
            $entity
        );
    }
}
