<?php

namespace Micro\Plugin\Eav\Business\Builder\Schema;

use Micro\Plugin\Eav\Business\Builder\Attribute\AttributeBuilderFactoryInterface;
use Micro\Plugin\Eav\Business\Builder\Attribute\AttributeBuilderInterface;
use Micro\Plugin\Eav\Business\Schema\Factory\SchemaFactoryInterface;
use Micro\Plugin\Eav\Business\Schema\Resolver\SchemaResolverFactoryInterface;
use Micro\Plugin\Eav\Entity\Schema\SchemaInterface;
use Micro\Plugin\Eav\Exception\SchemaNonUniqueException;

class SchemaBuilder implements SchemaBuilderInterface
{
    /**
     * @var string|null
     */
    private ?string $name = null;

    /**
     * @var string|null
     */
    private ?string $entityClass = null;

    /**
     * @var bool
     */
    private bool $isForce = false;

    /**
     * @var AttributeBuilderInterface[]
     */
    private array $attributeBuilderCollection = [];

    /**
     * @var SchemaInterface|null
     */
    private ?SchemaInterface $schema = null;

    /**
     * @param SchemaResolverFactoryInterface $schemaResolverFactory
     * @param SchemaFactoryInterface $schemaFactory
     * @param AttributeBuilderFactoryInterface $attributeBuilderFactory
     */
    public function __construct(
        private SchemaResolverFactoryInterface $schemaResolverFactory,
        private SchemaFactoryInterface $schemaFactory,
        private AttributeBuilderFactoryInterface $attributeBuilderFactory
    ) {}

    /**
     * {@inheritDoc}
     */
    public function setSchema(SchemaInterface $schema): SchemaBuilderInterface
    {
        $this->schema = $schema;
    }

    /**
     * {@inheritDoc}
     */
    public function setName(string $schemaName): self
    {
        $this->name = $schemaName;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setEntityClass(?string $entityClass): self
    {
        $this->entityClass = $entityClass;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function addAttribute(string $attributeName): AttributeBuilderInterface
    {
        $attributeBuilder = $this->attributeBuilderFactory->create($this, $attributeName);

        $this->attributeBuilderCollection[] = $attributeBuilder;

        return $attributeBuilder;
    }


    /**
     * {@inheritDoc}
     */
    public function force(bool $force = true): self
    {
        $this->isForce = $force;

        return $this;
    }

    /**
     * @return SchemaInterface
     */
    public function build(): SchemaInterface
    {
        $schema = $this->getOrCreateSchema();

        $schema->setEntityClass($this->entityClass);
        $this->setAttributes($schema);

        return $schema;
    }

    /**
     * @param SchemaInterface $schema
     */
    protected function setAttributes(SchemaInterface $schema): void
    {
        foreach ($this->attributeBuilderCollection as $builder) {
            $builder->create($schema);
        }
    }

    /**
     * @return SchemaInterface
     */
    protected function getOrCreateSchema(): SchemaInterface
    {
        if($this->schema !== null) {
            return $this->schema;
        }

        $resolver = $this->schemaResolverFactory->create();
        $schema = $resolver->resolve($this->name);

        if($schema === null) {
            return $this->schemaFactory->create($this->name);
        }

        if($this->isForce === false) {
            throw new SchemaNonUniqueException($this->name);
        }

        return $schema;
    }
}
