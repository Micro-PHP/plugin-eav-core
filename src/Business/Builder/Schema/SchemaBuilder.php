<?php

namespace Micro\Plugin\Eav\Business\Builder\Schema;


use Micro\Plugin\Eav\Business\Builder\Attribute\AttributeBuilderFactoryInterface;
use Micro\Plugin\Eav\Business\Builder\Attribute\AttributeBuilderInterface;
use Micro\Plugin\Eav\Business\Schema\SchemaManagerInterface;
use Micro\Plugin\Eav\Entity\Schema\SchemaInterface;
use Micro\Plugin\Eav\Exception\SchemaNonUniqueException;
use Micro\Plugin\Eav\Exception\SchemaNotFoundException;

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
     * @param SchemaManagerInterface $schemaManager
     * @param AttributeBuilderFactoryInterface $attributeBuilderFactory
     */
    public function __construct(
        private SchemaManagerInterface $schemaManager,
        private AttributeBuilderFactoryInterface $attributeBuilderFactory
    ) {}

    /**
     * @param string $schemaName
     * @return $this
     */
    public function setName(string $schemaName): self
    {
        $this->name = $schemaName;

        return $this;
    }

    /**
     * @param string|null $entityClass
     * @return $this
     */
    public function setEntityClass(?string $entityClass): self
    {
        $this->entityClass = $entityClass;

        return $this;
    }

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

        $this->schemaManager->save($schema);

        return $schema;
    }

    /**
     * @param SchemaInterface $schema
     */
    protected function setAttributes(SchemaInterface $schema)
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
        try {
            $schema = $this->schemaManager->findByName($this->name);
            if($this->isForce === false) {
                throw new SchemaNonUniqueException($this->name);
            }

            return $schema;

        } catch (SchemaNotFoundException $exception) {
            return $this->schemaManager->create($this->name);
        }
    }
}
