<?php

declare(strict_types=1);

namespace Akus\YASB;

/**
 * Class FormatFactory
 * @package Akus\YASB
 */
final class FormatFactory
{
    /**
     * @param array $format
     * @return Format
     */
    public function getFromArray(array $format) : Format
    {
        return new Format(
            $format['icon'],
            $format['icon_color'],
            $format['text_color'],
            $format['background_color'],
            $format['border_color'],
            (int) $format['border_top'],
            (int) $format['border_right'],
            (int) $format['border_bottom'],
            (int) $format['border_left'],
            (int) $format['min_width'],
            $format['align'],
            $format['urgent'],
            $format['separator'],
            (int) $format['separator_block_width']
        );
    }
}
