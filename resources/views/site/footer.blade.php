            </div>
        </main>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <p>&nbsp;</p>
                    </div>
                </div>
            </div>
        </footer>
        @include('js.site.footer')
        @if (!is_null($page_js))
        @include($page_js)
        @endif
    </body>
</html>
