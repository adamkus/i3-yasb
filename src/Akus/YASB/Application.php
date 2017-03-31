<?php

declare(strict_types=1);

namespace Akus\YASB;

use Akus\YASB\Blocks\Block;

/**
 * Class Application
 * @package Akus\YASB
 */
final class Application
{
    /** @var int */
    private $interval;

    /** @var Block[] */
    private $blocks;

    /**
     * Application constructor.
     * @param int $interval
     * @param Block[] $blocks
     */
    public function __construct(int $interval, array $blocks)
    {
        $this->interval = $interval;
        $this->blocks = $blocks;
    }

    /**
     * @return void
     */
    public function run()
    {
        echo json_encode(['version' => 1, 'click_events' => false]) . "\n[";

        while (true) {
            $output = [];
            foreach ($this->blocks as $block) {
                $content = $block->getUpdate();
                if (empty($content)) {
                    continue;
                }

                $output[] = $content;
            }

            echo json_encode($output) . ",\n";
            sleep($this->interval);
        }
    }
}
