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
        'title' => 'Random Stuff',
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

Route::get('/code-tests', function () {
    return view('site.main-template', [
        'page'  => 'code-tests',
        'title' => 'Code Tests',
    ]);
});

Route::get('/leantechniques-photo-album', function () {
    return view('site.main-template', [
        'page'  => 'leantechniques-photo-album',
        'js'    => 'leantechniques-photo-album',
        'title' => 'Lean TECHniques Photo Album',
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
