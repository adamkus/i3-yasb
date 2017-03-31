<?php

declare(strict_types=1);

namespace Akus\YASB\Blocks;

use Akus\YASB\Format;

/**
 * Class TextFile
 * @package Akus\YASB\Blocks
 */
final class TextFile implements Block
{
    /** @var string */
    private $name;

    /** @var string */
    private $path;

    /** @var Format */
    private $format;

    /**
     * TextFile constructor.
     * @param string $name
     * @param string $path
     * @param Format $format
     */
    public function __construct(string $name, string $path, Format $format)
    {
        $this->name = $name;
        $this->path = $path;
        $this->format = $format;
    }

    /**
     * @return array
     */
    public function getUpdate(): array
    {
        $content = file_exists($this->path) ? file_get_contents($this->path) : '';

        if (empty($content)) {
            return [];
        }

        return $this->format->format($this->name, $content);
    }
}
