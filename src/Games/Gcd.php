<?php

namespace BrainGames\Games\Gcd;

use function cli\line;
use function BrainGames\Cli\run as cliRun;

const OPERANDS = ["+", "-", "*"];

function run(): void
{
    global $userName;

    line('Find the greatest common divisor of given numbers.');
    $right = 0;
    while (true) {
        if ($right == 3) {
            line("Congratulations, {$userName}!");
            break;
        }
        $first = rand(1, 100);
        $second = rand(1, 100);
        if (cliRun("{$first} {$second}", checkAnswer($first, $second))) {
            $right++;
        } else {
            break;
        }
    }
}

function checkAnswer(int $first, int $second): int
{
    $min = min([$first, $second]);
    $max = max([$first, $second]);
    $module = ($max % $min);

    return ($module === 0) ? $min : checkAnswer($min, $module);
}