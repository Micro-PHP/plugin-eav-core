<?php

namespace Micro\Plugin\Eav;

use Micro\Plugin\Eav\Facade\Entity\EntityFacadeInterface;
use Micro\Plugin\Eav\Facade\Schema\SchemaFacadeInterface;

interface EavFacadeInterface
{
    /**
     * @return EntityFacadeInterface
     */
    public function entity(): EntityFacadeInterface;

    /**
     * @return SchemaFacadeInterface
     */
    public function schema(): SchemaFacadeInterface;
}
