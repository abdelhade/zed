<?php

use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::middleware(SetLocale::class)->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::get('/locale/{locale}', function (string $locale) {
        if (! in_array($locale, ['en', 'ar'], true)) {
            abort(404);
        }

        Session::put('locale', $locale);
        Session::put('locale_chosen', true);
        App::setLocale($locale);

        return redirect()->route('home');
    })->name('locale.switch');
});
