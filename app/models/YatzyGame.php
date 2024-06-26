<?php
namespace Yatzy;

class YatzyGame {
    private $rolls;
    private $diceValues;
    private $keepStates;

    public function __construct() {
        $this->rolls = 0;
        $this->diceValues = array_fill(0, 5, null);
        $this->keepStates = array_fill(0, 5, false);
    }

    public function rollDice($dice) {
        if ($this->rolls < 3) {
            foreach ($dice as $index => $die) {
                if (!$this->keepStates[$index]) {
                    $this->diceValues[$index] = $die->roll();
                }
            }
            $this->rolls++;
        }
    }

    public function keepDice($index) {
        $this->keepStates[$index] = true;
    }

    public function releaseDice($index) {
        $this->keepStates[$index] = false;
    }
}