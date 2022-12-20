<div class="row">
    <div class="col">
        <textarea id="markdown-source" class="form-control mr-sm-2" rows="10" aria-label="Enter your markdown here" placeholder="Enter your markdown here"></textarea>
    </div>
</div>

<div class="row mt-1">
    <div class="col">
        <button onclick="Markdown.convertToHtml();" id="convert-to-html" class="bg-light">Convert to HTML</button>
        <button onclick="Markdown.loadSampleMarkdown();" id="load-sample-markdown" class="bg-white border-0">Load Sample Markdown</button>
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
        <div hidden>
            <textarea id="sample-markdown" aria-label="Sample markdown"># Header one

&lt;?php phpinfo(); ?>

Hello there

Here's [link 1](https://www.google.com/), and here's [link 2](https://sdf).

How are you?
What's going on?

## Another Header

This is a paragraph [with an inline link](http://google.com). Neat, eh?

&lt;button onclick="alert('hello');">Hello&lt;/button>&lt;/div>
&lt;script>alert("hello");&lt;/script>

## This is a header [with a link](http://yahoo.com)</textarea>
        </div>
    </div>
</div>
