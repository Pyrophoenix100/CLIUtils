<?php
namespace Pyro100\CliUtils\Enums;
enum ClearMode: string
{
    case CURSOR_TO_END = '0';
    case CURSOR_TO_BEGINNING = '1';
    case ALL = '2';
}