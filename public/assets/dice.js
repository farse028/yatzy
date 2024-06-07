// dice.js - A simple dice module
class Dice {
    constructor(sides = 6) {
      this.sides = sides; // Default to a six-sided dice
    }
  
    roll() {
      // Returns a random integer between 1 and the number of sides
      return Math.floor(Math.random() * this.sides) + 1;
    }
  }
  
  export default Dice;