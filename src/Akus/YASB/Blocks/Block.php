<?php

declare(strict_types=1);

namespace Akus\YASB\Blocks;

interface Block
{
    /**
     * @return array
     */
    public function getUpdate() : array;
}
