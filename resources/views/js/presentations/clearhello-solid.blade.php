<script>
    /**
     * This section is for showing a refactor of:
     * - The single responsibility principle
     * - The interface segregation principle
     * - The guard pattern
     */
    class SIG {
        static factory(elementId) {
            return new SIG($(`#${elementId}`));
        }

        constructor(element) {
            this.element = element;
        }

        clearDisplay() {
            this.element.html("");
        }

        async runOriginalCode(iteration) {
            if (iteration) {
                if (typeof iteration === "number") {
                    if (iteration > 0) {
                        this.element.append(`<div class="mt-1">${iteration}</div>`);
                    // } else {
                    //     this.element.html("");
                    //     iteration = 1;
                    //     while (iteration <= 10) {
                    //         await time.wait(500);
                    //         await this.runOriginalCode(iteration);
                    //         iteration++;
                    //     }
                    }
                // } else {
                //     this.element.html("");
                //     iteration = 1;
                //     while (iteration <= 10) {
                //         await time.wait(500);
                //         await this.runOriginalCode(iteration);
                //         iteration++;
                //     }
                }
            } else {
                this.element.html("");
                iteration = 1;
                while (iteration <= 10) {
                    await time.wait(500);
                    await this.runOriginalCode(iteration);
                    iteration++;
                }
            }
        }

        async runRefactoredCode() {
            this.element.append("<div>hello</div>");
        }
    }
</script>

<script>
    /**
     * This section is for showing use of:
     * - The open / closed principle
     * - The Liskov substitution principle
     * - Dependency injection
     */
    class Animal {
        constructor() {
            OLDDisplay.clear();
            this._name = "";
            this._isA = "";
            this._covering = "";
            this._says = "";
            this._eats = "";
            this._moves = "";
            this._where = "";
            this.init();
        }

        init() {
            throw new Error("You must redefine init() in a sub-class!");
        }

        name() {
            OLDDisplay.addRow(`Hello, my name is ${this._name}.`);
            return this;
        }

        isA() {
            OLDDisplay.addRow(`I am a ${this._isA}.`);
            return this;
        }

        covering() {
            OLDDisplay.addRow(`I am covered with ${this._covering}.`);
            return this;
        }

        says() {
            OLDDisplay.addRow(`I say ${this._says}.`);
            return this;
        }

        eats() {
            OLDDisplay.addRow(`I eat ${this._eats}.`);
            return this;
        }

        movesWhere() {
            OLDDisplay.addRow(`I ${this._moves} in the ${this._where}.`);
            return this;
        }

        go() {
            OLDDisplay.clear();
            this
                .name()
                .isA()
                .covering()
                .says()
                .eats()
                .movesWhere();
        }
    }

    class Mammal extends Animal {
        constructor(mammalInstance) {
            super();
            this.init(mammalInstance);
        }

        init(mammalInstance) {
            // handle this function getting called from super()
            if (!mammalInstance) {
                return;
            }

            this._name = mammalInstance.name();
            this._isA = mammalInstance.isA();
            this._covering = mammalInstance.covering();
            this._says = mammalInstance.says();
            this._eats = mammalInstance.eats();
            this._moves = mammalInstance.moves();
            this._where = mammalInstance.where();
        }
    }

    class Dog {
        name() {
            return "Olive";
        }

        isA() {
            return "loving fur baby";
        }

        covering() {
            return "fur";
        }

        says() {
            return "wooooooooo-wooo";
        }

        eats() {
            return "kibble, table scraps, and whatever smells yummy in the trash";
        }

        moves() {
            return "nap";
        }

        where() {
            return "sun spot moving across the living room";
        }
    }

    class Panda {
        name() {
            return "Po";
        }

        isA() {
            return "big fat panda";
        }

        covering() {
            return "lots of fluff";
        }

        says() {
            return "grunt";
        }

        eats() {
            return "shoots and leaves";
        }

        moves() {
            return "climb";
        }

        where() {
            return "bamboo forest";
        }
    }

    class Fish extends Animal {
        constructor() {
            super();
        }

        init() {
            this._name = "Bubbles";
            this._isA = "fish";
            this._covering = "scales";
            this._says = "blub";
            this._eats = "flakes";
            this._moves = "swim";
            this._where = "fish tank";
        }
    }

    class OLDDisplay {
        static element() {
            return $("#solid-old-display-area");
        }

        static addRow(text) {
            if (typeof text !== "string") {
                text = "";
            }
            text = text.trim();
            if (text === "") {
                return;
            }
            OLDDisplay.element().append(`<div class="row"><div class="col">${text}</div></div>`);
        }

        static clear() {
            OLDDisplay.element().html("");
        }
    }
</script>
