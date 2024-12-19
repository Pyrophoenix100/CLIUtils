<?php
namespace Pyro100\CliUtils;
class Text
{
    static function Colored($text, Enums\TextColor $color)
    {

        return "\033[" . $color->value . "m" . $text . "\033[0m";
    }
    static function MoveCursor($x, $y)
    {
        return "\033[" . $y . ";" . $x . "H";
    }
    static function ClearScreen(Enums\ClearMode $mode)
    {
        return "\033[{$mode->value}J";
    }
    static function ClearLine(Enums\ClearMode $mode)
    {
        return "\033[{$mode->value}K";
    }
}