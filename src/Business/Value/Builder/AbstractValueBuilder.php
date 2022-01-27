<?php

namespace Micro\Plugin\Eav\Business\Value\Builder;

use Micro\Plugin\Eav\Entity\Attribute\AttributeInterface;
use Micro\Plugin\Eav\Entity\Entity\EntityInterface;

abstract class AbstractValueBuilder implements ValueBuilderInterface
{
    /**
     * @var mixed
     */
    private mixed $value;

    /**
     * @var AttributeInterface
     */
    private AttributeInterface $attribute;

    public function __construct(
        private EntityInterface $entity
    ) {}

    /**
     * {@inheritDoc}
     */
    public function setValue(mixed $value): ValueBuilderInterface
    {
        $this->value = $value;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setAttribute(AttributeInterface $attribute): ValueBuilderInterface
    {
        $this->attribute = $attribute;

        return $this;
    }

    abstract protected function createValueObject(): ValueInterface;

    /**
     * @param bool $force
     *
     * @return ValueInterface
     */
    public function apply(bool $force = true): ValueInterface
    {
        $this->createValueObject();
    }
}
