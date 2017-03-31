<?php

declare(strict_types=1);

namespace Akus\YASB;

/**
 * Class Format
 * @package Akus\YASB
 */
final class Format
{
    /** @var string */
    private $icon;

    /** @var string */
    private $iconColor;

    /** @var null|string */
    private $formattedIcon = null;

    /** @var string */
    private $textColor;

    /** @var string */
    private $backgroundColor;

    /** @var string */
    private $borderColor;

    /** @var int */
    private $borderTop;

    /** @var int */
    private $borderRight;

    /** @var int */
    private $borderBottom;

    /** @var int */
    private $borderLeft;

    /** @var  */
    private $minWidth;

    /** @var string */
    private $align;

    /** @var bool */
    private $urgent;

    /** @var bool */
    private $separator;

    /** @var int */
    private $separatorBlockWidth;

    /**
     * Format constructor.
     * @param string $icon
     * @param string $iconColor
     * @param string $textColor
     * @param string $backgroundColor
     * @param string $borderColor
     * @param int $borderTop
     * @param int $borderRight
     * @param int $borderBottom
     * @param int $borderLeft
     * @param $minWidth
     * @param string $align
     * @param bool $urgent
     * @param bool $separator
     * @param int $separatorBlockWidth
     */
    public function __construct(string $icon, string $iconColor, string $textColor, string $backgroundColor, string $borderColor, int $borderTop, int $borderRight, int $borderBottom, int $borderLeft, $minWidth, string $align, bool $urgent, bool $separator, int $separatorBlockWidth)
    {
        $this->icon = $icon;
        $this->iconColor = $iconColor;
        $this->textColor = $textColor;
        $this->backgroundColor = $backgroundColor;
        $this->borderColor = $borderColor;
        $this->borderTop = $borderTop;
        $this->borderRight = $borderRight;
        $this->borderBottom = $borderBottom;
        $this->borderLeft = $borderLeft;
        $this->minWidth = $minWidth;
        $this->align = $align;
        $this->urgent = $urgent;
        $this->separator = $separator;
        $this->separatorBlockWidth = $separatorBlockWidth;
    }

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }

    /**
     * @return string
     */
    public function getIconColor(): string
    {
        return $this->iconColor;
    }

    /**
     * @return string
     */
    public function getTextColor(): string
    {
        return $this->textColor;
    }

    /**
     * @return string
     */
    public function getBackgroundColor(): string
    {
        return $this->backgroundColor;
    }

    /**
     * @return string
     */
    public function getBorderColor(): string
    {
        return $this->borderColor;
    }

    /**
     * @return int
     */
    public function getBorderTop(): int
    {
        return $this->borderTop;
    }

    /**
     * @return int
     */
    public function getBorderRight(): int
    {
        return $this->borderRight;
    }

    /**
     * @return int
     */
    public function getBorderBottom(): int
    {
        return $this->borderBottom;
    }

    /**
     * @return int
     */
    public function getBorderLeft(): int
    {
        return $this->borderLeft;
    }

    /**
     * @return mixed
     */
    public function getMinWidth()
    {
        return $this->minWidth;
    }

    /**
     * @return string
     */
    public function getAlign(): string
    {
        return $this->align;
    }

    /**
     * @return bool
     */
    public function isUrgent(): bool
    {
        return $this->urgent;
    }

    /**
     * @return bool
     */
    public function isSeparator(): bool
    {
        return $this->separator;
    }

    /**
     * @return int
     */
    public function getSeparatorBlockWidth(): int
    {
        return $this->separatorBlockWidth;
    }

    /**
     * @param string $name
     * @param string $content
     * @return array
     */
    public function format(string $name, string $content) : array
    {
        $result = [
            'name' => $name,
            'full_text' => $this->getFormattedIcon() . $content,
            'markup' => 'pango',
            'border' => $this->getBorderColor(),
            'border_top' => $this->getBorderTop(),
            'border_right' => $this->getBorderRight(),
            'border_bottom' => $this->getBorderBottom(),
            'border_left' => $this->getBorderLeft(),
            'color' => $this->getTextColor(),
            'align' => $this->getAlign(),
            'urgent' => $this->isUrgent(),
            'separator' => $this->isSeparator(),
            'separator_block_width' => $this->getSeparatorBlockWidth()
        ];

        if (!empty($this->getBackgroundColor())) {
            $result['background'] = $this->getBackgroundColor();
        }

        if (!empty($this->getMinWidth())) {
            $result['min_width'] = $this->getMinWidth();
        }

        return $result;
    }

    /**
     * @return string
     */
    private function getFormattedIcon() : string
    {
        if ($this->formattedIcon === null) {
            if (empty($this->getIcon())) {
                $this->formattedIcon = '';
            } else {
                $this->formattedIcon = '<span weight=\'heavy\' fgcolor=\'' . $this->getIconColor() . '\'> ' . $this->getIcon() . '</span> ';
            }
        }

        return $this->formattedIcon;
    }
}
