<?php

namespace Micro\Plugin\Eav;


use Micro\Plugin\Eav\Business\Builder\Schema\SchemaBuilderInterface;

interface EavFacadeInterface
{
    /**
     * @return SchemaBuilderInterface
     */
    public function buildSchema(): SchemaBuilderInterface;
}
