<?php

namespace App\Http\Middleware;

use App\Enums\Language;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

/**
 * Middleware to set the application locale based on session
 */
class SetLocale
{
    /**
     * Handle an incoming request
     *
     * @param Request $request The incoming request
     * @param Closure $next The next middleware
     * @return Response The response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Session::has('locale')) {
            $locale = Session::get('locale');
            
            if (Language::isValid($locale)) {
                App::setLocale($locale);
            }
        }
        
        return $next($request);
    }
}
