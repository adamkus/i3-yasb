<?php

declare(strict_types=1);

namespace Akus\YASB;

use Symfony\Component\Yaml\Yaml;

/**
 * Class Config
 * @package Akus\YASB
 */
final class Config
{
    /** @var string */
    private $path;

    /**
     * Config constructor.
     * @param string $path
     */
    public function __construct(string $path)
    {
        $this->path = $path;
    }

    /**
     * @return array
     */
    public function parse() : array
    {
        $defaultConfig = Yaml::parse(file_get_contents(realpath(__DIR__ . '/../../../config/default.yml')));
        $userConfig = file_exists($this->path) ? Yaml::parse(file_get_contents($this->path)) : [];

        $defaultBlockFormat = $userConfig['default_block_format'] ?? $defaultConfig['default_block_format'] ?? [];
        $blocks = $userConfig['blocks'] ?? $defaultConfig['blocks'] ?? [];

        return [
            'interval' => $userConfig['interval'] ?? $defaultConfig['interval'] ?? 1,
            'blocks' => $this->parseBlocks($defaultBlockFormat, $blocks)
        ];
    }

    /**
     * @param array $defaultFormat
     * @param array $blocks
     * @return array
     */
    private function parseBlocks(array $defaultFormat, array $blocks) : array
    {
        $formattedBlocks = [];

        foreach ($blocks as $blockName => $block) {
            $block['format'] = array_merge($defaultFormat, $block['format'] ?? []);
            $formattedBlocks[$blockName] = $block;
        }

        return $formattedBlocks;
    }
}
