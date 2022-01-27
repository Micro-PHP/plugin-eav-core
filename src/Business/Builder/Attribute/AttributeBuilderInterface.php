<?php

namespace Micro\Plugin\Eav\Business\Builder\Attribute;

use Micro\Plugin\Eav\Business\Builder\Schema\SchemaBuilderInterface;
use Micro\Plugin\Eav\Entity\Attribute\AttributeInterface;
use Micro\Plugin\Eav\Entity\Schema\SchemaInterface;

interface AttributeBuilderInterface
{


    /**
     * @return AttributeInterface
     */
    public function create(SchemaInterface $schema): AttributeInterface;
}
