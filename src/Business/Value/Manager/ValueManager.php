<?php

namespace Micro\Plugin\Eav\Business\Value\Manager;

use Micro\Plugin\Eav\Business\Entity\Manager\EntityManagerInterface;
use Micro\Plugin\Eav\Business\Schema\SchemaAttributeManagerInterface;
use Micro\Plugin\Eav\Doctrine\Entity\Attribute\Attribute;
use Micro\Plugin\Eav\Doctrine\Entity\Entity\Entity;
use Micro\Plugin\Eav\Doctrine\Entity\Schema\Schema;
use Micro\Plugin\Eav\Entity\Entity\EntityInterface;
use Micro\Plugin\Eav\Entity\Value\ValueInterface;

class ValueManager implements ValueManagerInterface
{
    /**
     * @param EntityManagerInterface $entityManager
     * @param SchemaAttributeManagerInterface $schemaManager
     * @param ValueResolverInterface $valueResolver
     */
    public function __construct(
        private EntityManagerInterface          $entityManager,
        private SchemaAttributeManagerInterface $schemaManager,
        private ValueResolverInterface          $valueResolver
    ) {}

    public function setValue(EntityInterface $entity, string $attributeName, mixed $value): EntityInterface
    {
        $schema = $this->getEntitySchema($entity);
        $attribute = $this->getAttribute($schema, $attributeName);

        $this->valueResolver->setValue($entity, $attribute, $value);

        return $entity;
    }

    /**
     * @param EntityInterface $entity
     * @param string $attributeName
     *
     * @return ValueInterface
     */
    public function getValue(EntityInterface $entity, string $attributeName): ValueInterface
    {
        $schema = $this->getEntitySchema($entity);
        $attribute = $this->getAttribute($schema, $attributeName);

        return $this->valueResolver->getValue($entity, $attribute);
    }

    /**
     * @param Entity $entity
     * @return Schema
     */
    protected function getEntitySchema(Entity $entity): Schema
    {
        return $this->entityManager->getSchema($entity);
    }

    /**
     * @param Schema $schema
     * @param string $attribute
     */
    protected function getAttribute(Schema $schema, string $attribute): \Micro\Plugin\Eav\Entity\Attribute\AttributeInterface
    {
        return $this->schemaManager->getAttribute($schema, $attribute);
    }
}
