<?php

namespace App\Http\Middleware;

use Closure;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $langs = config('settings.languages');
        $prefix = $request->segment(1);

        if(!in_array($prefix, array_keys($langs))){
            $locale = config('app.locale');
        }else{
            $locale = $prefix;
        }

        app()->setLocale($locale);

        return $next($request);
    }
}
