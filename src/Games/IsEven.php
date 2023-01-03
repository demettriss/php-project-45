<?php

namespace BrainGames\Games\IsEven;

use function cli\line;
use function BrainGames\Cli\run as cliRun;

function run(): void
{
    global $userName;

    line('Answer "yes" if the number is even, otherwise answer "no".');
    $right = 0;
    while (true) {
        if ($right == 3) {
            line("Congratulations, {$userName}!");
            break;
        }
        $number = rand(1, 100);
        if (cliRun($number, checkAnswer($number))) {
            $right++;
        } else {
            break;
        }
    }
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function checkAnswer(int $number): string
{
    return isEven($number) ? "yes" : "no";
}