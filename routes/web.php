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
        App::setLocale($locale);

        return redirect()->to(url()->previous() !== url()->current() ? url()->previous() : route('home'));
    })->name('locale.switch');
});
