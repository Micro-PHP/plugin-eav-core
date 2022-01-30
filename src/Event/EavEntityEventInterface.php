<?php

namespace Micro\Plugin\Eav\Event;

use Micro\Component\EventEmitter\EventInterface;
use Micro\Plugin\Eav\Entity\Entity\EntityInterface;

interface EavEntityEventInterface extends EventInterface
{
    /**
     * @return EntityInterface
     */
    public function getEntity(): EntityInterface;
}
