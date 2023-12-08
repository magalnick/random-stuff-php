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
        'title' => 'Yor Mom!',
    ]);
});

Route::get('/presentations', function () {
    return view('site.main-template', [
        'page'  => 'presentations',
        'title' => 'Presentations',
    ]);
});

Route::get('/presentations/clearhello-solid', function () {
    return view('site.main-template', [
        'page'  => 'presentations.clearhello-solid',
        'js'    => 'presentations.clearhello-solid',
        'title' => 'ClearHello - SOLID and Other Design Principles',
    ]);
});

Route::get('/presentations/clearhello-solid', function () {
    return view('site.main-template', [
        'page'  => 'presentations.clearhello-solid',
        'js'    => 'presentations.clearhello-solid',
        'title' => 'ClearHello - SOLID and Other Design Principles',
    ]);
});

Route::get('/code-tests', function () {
    return view('site.main-template', [
        'page'  => 'code-tests',
        'title' => 'Code Tests',
    ]);
});

Route::get('/code-tests/leantechniques-photo-album', function () {
    return view('site.main-template', [
        'page'  => 'code-tests.leantechniques-photo-album',
        'js'    => 'code-tests.leantechniques-photo-album',
        'title' => 'Lean TECHniques Photo Album',
    ]);
});

Route::get('/code-tests/clinicomp-code-test', function () {
    return view('site.main-template', [
        'page'  => 'code-tests.clinicomp-code-test',
        'js'    => 'code-tests.clinicomp-code-test',
        'title' => 'CliniComp Code Test',
    ]);
});

Route::get('/code-tests/mailchimp-markdown-test', function () {
    return view('site.main-template', [
        'page'  => 'code-tests.mailchimp-markdown-test',
        'js'    => 'code-tests.mailchimp-markdown-test',
        'title' => 'Mailchimp Markdown Test',
    ]);
});
