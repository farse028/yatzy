import Dice from "/public/assets/dice.js";

class YatzyGame {
    constructor() {
        this.rollNumber = 0; // Which roll you are on (0, 1, 2, or 3)
        this.dices = [new Dice(), new Dice(), new Dice(), new Dice(), new Dice()]; // Current value on each of the 5 dice
        this.keepState = [false, false, false, false, false]; // Keep / re-roll state of each dice
        this.scoreState = {
            //upper section
            ones: null,
            twos: null,
            threes: null,
            fours: null,
            fives: null,
            sixes: null,

            // lower section
            onePair: null,
            twoPair: null,
            threeOfAKind: null,
            fourOfAKind: null,
            smallStraight: null,
            largeStraight: null,
            fullHouse: null,
            chance: null,
            yatzy: null
        }
    }


    rollDice() {
        // Roll the dice that are not kept
        for (let i = 0; i < this.dices.length; i++) {
            if (!this.keepState[i]) {
                this.dices[i].roll();
            }
        }
        this.rollNumber++;
    }

    toggleKeep(index) {
        // Toggle the keep state of a die at the given index
        this.keepState[index] = !this.keepState[index];
    }

    resetTurn() {
        // Reset the turn to its initial state
        this.rollNumber = 0; // Which roll you are on (0, 1, 2, or 3)
        this.dices = [new Dice(), new Dice(), new Dice(), new Dice(), new Dice()]; // Current value on each of the 5 dice
        this.keepState = [false, false, false, false, false]; // Keep / re-roll state of each dice
    }
}

export default YatzyGame;
  