@php
    $site_name = 'Random Stuff';
    $page_js = isset($js) ? "js.{$js}" : null;
@endphp
@include('site.header')
@include($page)
@include('site.footer')
