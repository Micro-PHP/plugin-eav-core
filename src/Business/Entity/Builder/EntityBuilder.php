<?php

namespace Micro\Plugin\Eav\Business\Entity\Builder;

use Micro\Plugin\Eav\Business\Attribute\Resolver\EntityAttributeResolverFactoryInterface;
use Micro\Plugin\Eav\Business\Entity\Factory\EntityFactoryInterface;
use Micro\Plugin\Eav\Business\Schema\Resolver\SchemaResolverFactoryInterface;
use Micro\Plugin\Eav\Business\Value\Resolver\ValueResolverFactoryInterface;
use Micro\Plugin\Eav\Business\Value\Set\ValueObjectSetFactoryInterface;
use Micro\Plugin\Eav\Business\Value\Typehint\ValueTypehintConverterFactoryInterface;
use Micro\Plugin\Eav\Business\Value\Unique\EntityAttributeUniqueGeneratorFactoryInterface;
use Micro\Plugin\Eav\Business\Value\Unique\EntityAttributeUniqueGeneratorInterface;
use Micro\Plugin\Eav\Doctrine\Entity\Attribute\Attribute;
use Micro\Plugin\Eav\Doctrine\Entity\Entity\Entity;
use Micro\Plugin\Eav\Entity\Attribute\AttributeInterface;
use Micro\Plugin\Eav\Entity\Entity\EntityInterface;
use Micro\Plugin\Eav\Entity\Schema\SchemaInterface;
use Micro\Plugin\Eav\Entity\Value\ValueInterface;
use Micro\Plugin\Eav\Exception\AttributeValidationException;
use Micro\Plugin\Eav\Exception\EntityValidationException;
use Micro\Plugin\Eav\Exception\InvalidArgumentException;

class EntityBuilder implements EntityBuilderInterface
{
    /**
     * @var array<string, mixed>
     */
    private array $entityValues = [];

    /**
     * @var string|null
     */
    private ?string $schemaName = null;


    /**
     * @param EntityAttributeResolverFactoryInterface $entityAttributeResolverFactory
     * @param SchemaResolverFactoryInterface $schemaResolverFactory
     * @param ValueResolverFactoryInterface $valueResolverFactory
     * @param ValueObjectSetFactoryInterface $valueObjectSetFactory
     * @param ValueTypehintConverterFactoryInterface $valueTypehintConverterFactory
     * @param EntityFactoryInterface $entityFactory
     * @param EntityAttributeUniqueGeneratorFactoryInterface $entityAttributeUniqueGeneratorFactory
     * @param EntityInterface|null $entity
     */
    public function __construct(
    private EntityAttributeResolverFactoryInterface        $entityAttributeResolverFactory,
    private SchemaResolverFactoryInterface                 $schemaResolverFactory,
    private ValueResolverFactoryInterface                  $valueResolverFactory,
    private ValueObjectSetFactoryInterface                 $valueObjectSetFactory,
    private ValueTypehintConverterFactoryInterface         $valueTypehintConverterFactory,
    private EntityFactoryInterface                         $entityFactory,
    private EntityAttributeUniqueGeneratorFactoryInterface $entityAttributeUniqueGeneratorFactory,
    private ?EntityInterface                               $entity = null
    )
    {
    }

    /**
     * {@inheritDoc}
     */
    public function setSchema(string $schemaName): self
    {
        $this->schemaName = $schemaName;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setValue(string $attributeName, mixed $value): EntityBuilderInterface
    {
        $this->entityValues[$attributeName] = $value;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function build(): EntityInterface
    {
        $exceptions = [];
        foreach ($this->entityValues as $attributeName => $attributeValue) {
            try {
                $this->setAttributeValue($attributeName, $attributeValue);
            } catch (\Throwable $exception) {
                $exceptions[] = $exception;
            }
        }

        $entity = $this->getEntity();

        if(count($exceptions) > 0) {
            throw new EntityValidationException($exceptions, $entity);
        }

        return $entity;
    }

    /**
     * @param string $attributeName
     * @param mixed $value
     *
     * @throws \RuntimeException
     * @throws InvalidArgumentException
     *
     * @return void
     */
    protected function setAttributeValue(string $attributeName, mixed $value): void
    {
        $entity = $this->getEntity();

        /** @var Attribute $attribute */
        $attribute   = $this->lookupAttribute($attributeName);
        $valueObject = $this->valueResolverFactory->create()
            ->resolve($entity, $attribute);

        try {
            $convertedValue = $this->valueTypehintConverterFactory
                ->create($attribute->getType())
                ->convert($value);
        } catch (InvalidArgumentException $e) {
            throw new AttributeValidationException($attribute, $value, $e->getCode(), $e);
        }

        $this->valueObjectSetFactory
            ->create()
            ->set($valueObject, $convertedValue);

        $entity->getPersistentValues()->add($valueObject);

        $this->setUniqueIndex($entity, $attribute, $valueObject);
    }

    /**
     * @param EntityInterface $entity
     * @param AttributeInterface $attribute
     * @param ValueInterface $value
     * @return void
     */
    protected function setUniqueIndex(EntityInterface $entity, AttributeInterface $attribute, ValueInterface $value): void
    {
        if(!$attribute->isUnique()) {
            return;
        }

        $this->entityAttributeUniqueGeneratorFactory
            ->create()
            ->generate($entity, $attribute, $value);
    }

    /**
     * @param string $attribute
     * @return AttributeInterface
     */
    protected function lookupAttribute(string $attribute): AttributeInterface
    {
        return $this->entityAttributeResolverFactory
            ->create()
            ->resolve($this->getEntity(), $attribute);
    }

    /**
     * @return Entity
     */
    protected function getEntity(): EntityInterface
    {
        if($this->entity !== null) {
            return $this->entity;
        }

        $this->entity = $this->entityFactory->create($this->lookupSchema());

        return $this->entity;
    }

    /**
     * @return SchemaInterface
     */
    protected function lookupSchema(): SchemaInterface
    {
        return $this->schemaResolverFactory->create()->resolve($this->schemaName);
    }
}
