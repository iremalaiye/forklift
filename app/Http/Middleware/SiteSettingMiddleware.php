<?php

namespace App\Http\Middleware;

use App\Models\ContactInformation;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SiteSettingMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Retrieve all site settings as a key-value array (name => data)
        $settings=ContactInformation::pluck('data','name')->toArray();

        // Share the settings with all views
        view()->share(['settings'=>$settings]);

        // Continue to the next middleware/request
        return $next($request);
    }
}
