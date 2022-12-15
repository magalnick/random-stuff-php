<div class="row">
    <div class="col">
        <h3>First 2 letters and a number</h3>
        <p>Type in a first name, last name, and age. The output will be the first 2 letters of both names followed by the age.</p>
        <p>For example, "Tim", "Tebow", 32 would output "TiTe32".</p>
        <div>
            <input type="text" name="name" placeholder="First name" id="test-substr-name" minlength="2" maxlength="20" />
        </div>
        <div class="mt-1">
            <input type="text" name="surname" placeholder="Last name" id="test-substr-surname" minlength="2" maxlength="20" />
        </div>
        <div class="mt-1">
            <input type="number" name="age" placeholder="Age" id="test-substr-age" min="1" max="200" />
        </div>
        <div class="mt-1">
            <button id="test-substr-button">Go!</button>
        </div>
        <div class="mt-1">
            <div id="test-substr-output">&nbsp;</div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <hr />
    </div>
</div>
<div class="row">
    <div class="col">
        <h3>Lots of A and B</h3>
        <p>Type in numbers for A and B to get a formatted string of "aabb..." where neither letter is repeated more than twice in a row.</p>
        <p>For example, "6" and "4" would output "aabbaabbaa".</p>
        <div>
            <input type="number" name="A" placeholder="A" id="test-a-b-a" min="1" max="20" />
        </div>
        <div class="mt-1">
            <input type="number" name="B" placeholder="B" id="test-a-b-b" min="1" max="20" />
        </div>
        <div class="mt-1">
            <button id="test-a-b-button">Go!</button>
        </div>
        <div class="mt-1">
            <div id="test-a-b-output">&nbsp;</div>
        </div>
    </div>
</div>
