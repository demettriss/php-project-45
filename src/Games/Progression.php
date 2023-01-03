<?php

namespace BrainGames\Games\Progression;

use function cli\line;
use function cli\prompt;

function run(): void
{
    global $userName;

    line('What number is missing in the progression?');
    $right = 0;
    while (true) {
        if ($right == 3) {
            line("Congratulations, {$userName}!");
            break;
        }
        $first = rand(1, 100);
        $step = rand(1, 5);
        $index = rand(0, 9);
        $progression = getProgression($first, $step, 10);
        $correctAnswer = $progression[$index];
        $progression[$index] = '...';
        $question = implode(' ', $progression);

        line("Question: {$question}");
        $answer = prompt('Your answer');
        if ($answer != $correctAnswer) {
            $right = 0;
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$userName}!");
            break;
        } else {
            $right++;
            line("Correct!");
        }
    }
}

function getProgression(int $first, int $step, int $size): array
{
    $arr = [];
    for ($i = 0; $i < $size; $i++) {
        $arr[] = $first + $step * $i;
    }
    return $arr;
}