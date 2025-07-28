<?php

namespace App\Http\Middleware;

use App\Models\SiteSetting;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PanelSettingMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Retrieve all site settings as a name => data array
        $settings=SiteSetting::pluck('data','name')->toArray();

        // Share the settings with all views
        view()->share(['settings'=>$settings]);

        // Continue to the next middleware/request
        return $next($request);
    }
}
