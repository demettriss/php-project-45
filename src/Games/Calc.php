<?php

namespace BrainGames\Games\Calc;

use function cli\line;
use function BrainGames\Cli\run as cliRun;

const OPERANDS = ["+", "-", "*"];

function run(): void
{
    global $userName;

    line('What is the result of the expression?');
    $right = 0;
    while (true) {
        if ($right == 3) {
            line("Congratulations, {$userName}!");
            break;
        }
        $first = rand(1, 50);
        $operand = OPERANDS[array_rand(OPERANDS)];
        $second = rand(1, 50);
        $question = "{$first} {$operand} {$second}";
        if (cliRun($question, checkAnswer($question))) {
            $right++;
        } else {
            break;
        }
    }
}

function checkAnswer(string $question): ?int
{
    try {
        eval("\$result = $question;");
    } catch (\Exception $e) {
        $result = null;
    }
    return $result;
}