<?php

declare(strict_types=1);

namespace Akus\YASB\Blocks;

use Akus\YASB\Format;

/**
 * Class Command
 * @package Akus\YASB\Blocks
 */
final class Command implements Block
{
    /** @var string */
    private $name;

    /** @var string */
    private $command;

    /** @var Format */
    private $format;

    /**
     * TextFile constructor.
     * @param string $name
     * @param string $command
     * @param Format $format
     */
    public function __construct(string $name, string $command, Format $format)
    {
        $this->name = $name;
        $this->format = $format;
        $this->command = $command;
    }

    /**
     * @return array
     */
    public function getUpdate(): array
    {
        $content = [];
        exec($this->command, $content);
        $content = trim(join(' ', $content));

        if (empty($content)) {
            return [];
        }

        return $this->format->format($this->name, $content);
    }
}
