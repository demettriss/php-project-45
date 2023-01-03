<?php

namespace BrainGames\Games\Calc;

use function cli\line;
use function cli\prompt;

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
        line("Question: {$question}");
        $answer = prompt('Your answer');
        $correctAnswer = checkAnswer($question);
        if ($answer != $correctAnswer) {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$userName}!");
            break;
        } else {
            $right++;
            line("Correct!");
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