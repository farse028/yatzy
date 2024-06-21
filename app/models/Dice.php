<?php
namespace Yatzy;
class Dice {
    // Define the number of sides on the dice
    private $sides;

    // Constructor to initialize the dice with a specific number of sides
    public function __construct($sides = 6) {
        $this->sides = $sides;
    }

    // Roll the dice and return a random number between 1 and the number of sides
    public function roll() {
        return rand(1, $this->sides);
    }
}