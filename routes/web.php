<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('site.main-template', [
        'page'  => 'home',
        'title' => 'Random Stuff in PHP',
    ]);
});

Route::get('/clinicomp-code-test', function () {
    return view('site.main-template', [
        'page'  => 'clinicomp-code-test',
        'js'    => 'clinicomp-code-test',
        'title' => 'CliniComp Code Test',
    ]);
});

Route::get('/mailchimp-markdown-test', function () {
    return view('site.main-template', [
        'page'  => 'mailchimp-markdown-test',
        'js'    => 'mailchimp-markdown-test',
        'title' => 'Mailchimp Markdown Test',
    ]);
});
