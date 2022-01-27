<?php

namespace Micro\Plugin\Eav\Business\Builder\Attribute;

use Micro\Plugin\Eav\Business\Attribute\AttributeFactoryInterface;
use Micro\Plugin\Eav\Business\Builder\Schema\SchemaBuilderInterface;
use Micro\Plugin\Eav\Business\Schema\SchemaAttributeManagerInterface;
use Micro\Plugin\Eav\Entity\Attribute\AttributeInterface;
use Micro\Plugin\Eav\Entity\Schema\SchemaInterface;
use Micro\Plugin\Eav\Exception\AttributeNotFoundException;

class AttributeBuilder implements AttributeBuilderInterface
{
    /**
     * @var string
     */
    private string $type = 'string';
    /**
     * @var bool
     */
    private bool $isNullable = true;
    /**
     * @var int|null
     */
    private ?int $length = null;
    /**
     * @var string|null
     */
    private ?string $description = null;
    /**
     * @var mixed|null
     */
    private mixed $defaultValue = null;

    /**
     * @var bool
     */
    private bool $isUnique = false;

    /**
     * @param SchemaAttributeManagerInterface $schemaManager
     * @param SchemaBuilderInterface $schemaBuilder
     * @param AttributeFactoryInterface $attributeFactory
     */
    public function __construct(
        private SchemaAttributeManagerInterface $schemaManager,
        private SchemaBuilderInterface          $schemaBuilder,
        private AttributeFactoryInterface       $attributeFactory,
        private string                          $attributeName
    )
    {}


    /**
     * {@inheritDoc}
     */
    public function setType(string $type): AttributeBuilderInterface
    {
        $this->type = $type;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setIsNullable(bool $isNullable): AttributeBuilderInterface
    {
        $this->isNullable = $isNullable;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setLength(int $length): AttributeBuilderInterface
    {
        $this->length = $length;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setDescription(string $description): AttributeBuilderInterface
    {
        $this->description = $description;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setDefaultValue(mixed $defaultValue): AttributeBuilderInterface
    {
        $this->defaultValue = $defaultValue;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setIsUnique(bool $isUnique): AttributeBuilderInterface
    {
        $this->isUnique = $isUnique;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function complete(): SchemaBuilderInterface
    {
        return $this->schemaBuilder;
    }

    /**
     * {@inheritDoc}
     */
    public function create(SchemaInterface $schema): AttributeInterface
    {
        $attribute = $this->getAttribute($schema);
        $attribute->setName($this->attributeName)
            ->setType($this->type)
            ->setDefaultValue($this->defaultValue)
            ->setDescription($this->description)
            ->setIsUnique($this->isUnique)
            ->setNullable($this->isNullable)
            ->setLength($this->length)
        ;

        $this->schemaManager->addAttribute($schema, $attribute);

        return $attribute;
    }

    /**
     * @param SchemaInterface $schema
     * @return AttributeInterface
     */
    protected function getAttribute(SchemaInterface $schema)
    {
        try {
            return $this->schemaManager->getAttribute($schema, $this->attributeName);
        } catch (AttributeNotFoundException $exception) {
            return $this->attributeFactory->create($schema, $this->attributeName, $this->type);
        }
    }
}
