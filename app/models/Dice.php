<?php
namespace Yatzy;
class Dice {
    // Define the minimum and maximum values of the dice
    public $min = 1;
    public $max = 6;

    // Constructor to initialize the dice with a specific number of sides
    public function __construct($min = 1, $max = 6) {
        $this->min = $min;
        $this->max = $max;
    }

    // Roll the dice and return a random number between 1 and the number of sides
    public function roll() {
        return rand($this->min, $this->max);
    }
}