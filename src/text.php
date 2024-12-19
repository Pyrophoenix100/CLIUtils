<?php
namespace Pyro100\CliUtils;
class Text
{
    static function Colored($text, TextColor $color)
    {

        return "\033[" . $color->value . "m" . $text . "\033[0m";
    }
    static function MoveCursor($x, $y)
    {
        return "\033[" . $y . ";" . $x . "H";
    }
}