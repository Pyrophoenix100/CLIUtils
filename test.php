<?php
include_once(__DIR__ . '\\src\\enums\\TextColor.php');
include_once(__DIR__ . '\\src\\enums\\ClearMode.php');
include_once(__DIR__ . '\\src\\Text.php');
use Pyro100\CliUtils\Text;
use Pyro100\CliUtils\Enums\TextColor;
use Pyro100\CliUtils\Enums\ClearMode;

class Test
{
    public function __construct(string $testName, callable $testFunction) {
        $this->testName = $testName;
        $this->testFunction = $testFunction;
    }
    public static function run($testName, $testFunction)
    {
        echo "Running test: $testName\n";
        $testFunction();
        echo "Did the test pass? (yes/no): ";
        $handle = fopen("php://stdin", "r");
        $line = fgets($handle);
        if (trim($line) != 'yes') {
            echo "Test $testName failed.\n";
        } else {
            echo "Test $testName passed.\n";
        }
        fclose($handle);
        echo "\n";
    }

    public static function testColored()
    {
        echo Text::Colored("This text should be green.", TextColor::GREEN) . PHP_EOL;
        echo Text::Colored("This text should be red.", TextColor::RED) . PHP_EOL;
        echo Text::Colored("This text should be blue.", TextColor::BLUE) . PHP_EOL;
    }

    public static function testMoveCursor()
    {
        echo Text::MoveCursor(10, 10) . "Cursor moved to (10, 10)" . PHP_EOL;
    }

    public static function testClearScreen()
    {
        echo Text::ClearScreen(ClearMode::ALL) . "Screen cleared" . PHP_EOL;
    }

    public static function testClearLine()
    {
        echo Text::ClearLine(ClearMode::ALL) . "Line cleared" . PHP_EOL;
    }

    public static function runTests()
    {
        self::runTest('Colored', [self::class, 'testColored']);
        self::runTest('MoveCursor', [self::class, 'testMoveCursor']);
        self::runTest('ClearScreen', [self::class, 'testClearScreen']);
        self::runTest('ClearLine', [self::class, 'testClearLine']);
    }
}

Test::runTests();