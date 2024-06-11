class YatzyGame {
    constructor() {
      this.rollNumber = 0; // Which roll you are on (0, 1, 2, or 3)
      this.diceValues = [0, 0, 0, 0, 0]; // Current value on each of the 5 dice
      this.keepState = [false, false, false, false, false]; // Keep / re-roll state of each dice
    }
  
    rollDice() {
      // Roll the dice that are not kept
      for (let i = 0; i < this.diceValues.length; i++) {
        if (!this.keepState[i]) {
          this.diceValues[i] = Math.floor(Math.random() * 6) + 1;
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
      this.rollNumber = 0;
      this.diceValues = [0, 0, 0, 0, 0];
      this.keepState = [false, false, false, false, false];
    }
  }
  
  export default YatzyGame;
  