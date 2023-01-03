<?php

namespace BrainGames\Games\Prime;

use function cli\line;
use function BrainGames\Cli\run as cliRun;

function run(): void
{
    global $userName;

    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    $right = 0;
    while (true) {
        if ($right >= 3) {
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

function isPrime(int $number): bool
{
    if ($number < 2) {
        return false;
    }
    for ($i = 2; $i ** 2 <= $number; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}


function checkAnswer(int $number): string
{
    return isPrime($number) ? "yes" : "no";
}