<?php

namespace App\Http\Middleware;

use Closure;
use App\Language;
use Illuminate\Http\Request;

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

        session()->put('trans', $this->getCode());
        session()->put('rtl', $this->getDirection());

        app()->setLocale(session('trans',  $this->getCode()));
        return $next($request);
    }
    public function getCode()
    {
        if (session()->has('trans')) {
            return session('trans');
        }
        $language = Language::where('is_active', 1)->first();
        return $language ? $language->short_name : 'US';
    }

    public function getDirection()
    {
        if (session()->has('rtl')) {
            return session('rtl');
        }
        $language = Language::where('is_active', 1)->first();
        return $language ? $language->rtl : 0;
    }
}
