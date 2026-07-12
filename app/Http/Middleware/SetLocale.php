<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        // Only honor session locale after an explicit user switch (EN/AR).
        // Otherwise always default to Arabic.
        if (Session::get('locale_chosen') === true) {
            $locale = Session::get('locale', 'ar');
        } else {
            $locale = 'ar';
            Session::put('locale', 'ar');
        }

        if (! in_array($locale, ['en', 'ar'], true)) {
            $locale = 'ar';
            Session::put('locale', 'ar');
        }

        App::setLocale($locale);

        return $next($request);
    }
}
