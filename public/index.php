<?php
require_once('_config.php');

use Yatzy\Dice;
use Yatzy\YatzyGame;

// Create a new Yatzy game instance
$yatzyGame = new YatzyGame();

// Create five dice instances
$dice = [];
for ($i = 0; $i < 5; $i++) {
    $dice[] = new Dice();
}

// Simulate rolling the dice three times
for ($rollNumber = 1; $rollNumber <= 3; $rollNumber++) {
    echo "Roll {$rollNumber}:<br>";

    // Roll the dice
    $yatzyGame->rollDice($dice);

    // Output the values of the dice
    for ($i = 0; $i < 5; $i++) {
        echo "Dice " . ($i + 1) . ": " . $dice[$i]->roll() . "<br>";
    }

    // Decide whether to keep or re-roll each dice
    // For simplicity, this example just randomly decides
    for ($i = 0; $i < 5; $i++) {
        if (rand(0, 1)) {
            $yatzyGame->keepDice($i);
            echo "Keeping dice " . ($i + 1) . "<br>";
        } else {
            $yatzyGame->releaseDice($i);
            echo "Re-rolling dice " . ($i + 1) . "<br>";
        }
    }

    echo "<br>";
}