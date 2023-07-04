<p>
    <a
        href="https://docs.google.com/presentation/d/1-1JeaBIpFcuJ3coz4M526D7OzeL0Nlrc6O_ykypMY6Y/edit?usp=drive_link"
        target="_blank"
    >Open the presentation deck</a>
</p>

<h3>(S)ingle responsibility, (I)nterface segregation, (G)uard pattern</h3>
<div class="row">
    <div class="col-6">
        <p>
            <button class="bg-info" id="solid-sig-original-button" onclick="SIG.factory('solid-sig-original-content').runOriginalCode()">Run original code</button>
            <button class="bg-close" onclick="SIG.factory('solid-sig-original-content').clearDisplay();">Clear display</button>
        </p>
        <div class="mt-2" id="solid-sig-original-content"></div>
    </div>
    <div class="col-6">
        <p>
            <button class="bg-info" id="solid-sig-refactored-button" onclick="SIG.factory('solid-sig-refactored-content').runRefactoredCode()">Run refactored code</button>
            <button class="bg-close" onclick="SIG.factory('solid-sig-refactored-content').clearDisplay();">Clear display</button>
        </p>
        <div class="mt-2" id="solid-sig-refactored-content"></div>
    </div>
</div>

<h3 class="mt-3">(O)pen / closed, (L)iskov substitution, (D)ependency injection</h3>
<div class="row">
    <div class="col">
        <p>
            <button class="bg-info" onclick="(new Animal()).go();">Animal on its own</button>
            <button class="bg-info" onclick="(new Mammal()).go();">Mammal on its own</button>
            <button class="bg-info" onclick="(new Mammal(new Dog())).go();">Dog</button>
            <button class="bg-info" onclick="(new Mammal(new Panda())).go();">Panda</button>
            <button class="bg-info" onclick="(new Fish()).go();">Fish</button>
            <button class="bg-close" onclick="OLDDisplay.clear();">Clear display</button>
        </p>
        <div class="mt-2" id="solid-old-display-area"></div>
    </div>
</div>
