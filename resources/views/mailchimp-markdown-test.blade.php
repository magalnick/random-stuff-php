<div class="row">
    <div class="col">
        <textarea id="markdown-source" class="form-control mr-sm-2" rows="10" aria-label="Enter your markdown here" placeholder="Enter your markdown here"></textarea>
    </div>
</div>

<div class="row mt-1">
    <div class="col">
        <button onclick="Markdown.convertToHtml();" id="convert-to-html" class="bg-light">Convert to HTML</button>
    </div>
</div>

<div class="row mt-4">
    <div class="col">
        <textarea id="converted-to-html" class="form-control mr-sm-2" rows="10" aria-label="Converted to HTML" placeholder="Converted to HTML" disabled></textarea>
    </div>
</div>

<div class="row mt-4">
    <div class="col">
        Rendered HTML
    </div>
</div>
<div class="row">
    <div class="col">
        <div id="rendered-html" class="border rounded p-2"></div>
    </div>
</div>
