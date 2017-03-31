<?php

declare(strict_types=1);

namespace Akus\YASB;

use Akus\YASB\Blocks\Block;
use Akus\YASB\Blocks\Command;
use Akus\YASB\Blocks\TextFile;

/**
 * Class BlocksFactory
 * @package Akus\YASB
 */
final class BlocksFactory
{
    /** @var FormatFactory */
    private $formatFactory;

    /**
     * BlocksFactory constructor.
     * @param FormatFactory $formatFactory
     */
    public function __construct(FormatFactory $formatFactory)
    {
        $this->formatFactory = $formatFactory;
    }

    /**
     * @param array $block
     * @return Block
     */
    public function getFromArray(array $block) : Block
    {
        if ($block['type'] === 'text-file') {
            return new TextFile($block['name'], $block['path'], $this->formatFactory->getFromArray($block['format']));
        }

        return new Command($block['name'], $block['command'], $this->formatFactory->getFromArray($block['format']));
    }
}
