<?php
require_once('_config.php');

use Yatzy\Dice;
use Yatzy\YatzyGame;
use Yatzy\YatzyEngine;

// Create a new Yatzy game instance
$yatzyGame = new YatzyGame();
$yatzyEngine = new YatzyEngine();

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
    // For simplicity, it example just randomly decides
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

// Simulate a turn in the game
$yatzyGame->rollDice($dice);

// Get the dice values after rolling
$diceValues = [];
foreach ($dice as $die) {
    $diceValues[] = $die->roll();
}

echo '<pre>'; print_r($diceValues); echo '</pre>';

// Calculate the score for a specific box (e.g., ones)
$scoreForOnes = $yatzyEngine->calculateScoreForBox($diceValues, 1);
echo "Score for ones: " . $scoreForOnes . "<br>";
$scoreForTwos = $yatzyEngine->calculateScoreForBox($diceValues, 2);
echo "Score for twos: " . $scoreForTwos . "<br>";
$scoreForThrees = $yatzyEngine->calculateScoreForBox($diceValues, 3);
echo "Score for threes: " . $scoreForThrees . "<br>";
$scoreForFours = $yatzyEngine->calculateScoreForBox($diceValues, 4);
echo "Score for fours: " . $scoreForFours . "<br>";
$scoreForFives = $yatzyEngine->calculateScoreForBox($diceValues, 5);
echo "Score for fives: " . $scoreForFives . "<br>";

$scoreCard = [$scoreForOnes+$scoreForTwos+$scoreForThrees+$scoreForFours+$scoreForFives];

// Update the overall score of the game
$overallScoreData = $yatzyEngine->updateOverallScore($scoreCard);
echo "Total Score: " . $overallScoreData['totalScore'] . "<br>";
echo "Bonus: " . $overallScoreData['bonus'] . "<br>";

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
    $view = file_get_contents("{$GLOBALS["appDir"]}/views/index.html");
    $response->getBody()->write($view);
    return $response;
});

$app->run();
