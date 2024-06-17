class Dice {

    constructor(sides = 6) {
        this.sides = sides; // Default to a six-sided dice
        this.state = Math.floor(Math.random() * this.sides) + 1;
        this.dom = document.createElement('div');
        this.dom.className = 'dice';
    }

    roll() {
        // Returns a random integer between 1 and the number of sides
        this.state = Math.floor(Math.random() * this.sides) + 1;
        return this.state;
    }

    render() {
        const layouts = {
            1: [false, false, false,
                false, true, false,
                false, false, false],
            2: [true, false, false,
                false, false, false,
                false, false, true],
            3: [true, false, false,
                false, true, false,
                false, false, true],
            4: [true, false, true,
                false, false, false,
                true, false, true],
            5: [true, false, true,
                false, true, false,
                true, false, true],
            6: [true, false, true,
                true, false, true,
                true, false, true],

        }

        for (let i = 0; i < 9; i++) {
            let child = document.createElement("div");
            if (layouts[this.state][i]) {
                child.className = "dot";
            }
            this.dom.appendChild(child);
        }
        console.log(this.state);
        return this.dom;
    }
}

export default Dice;