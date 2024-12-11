<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Sitemap\SitemapGenerator;
use Symfony\Component\HttpFoundation\Response;

class CheckIfAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    private $roleRoutes = [
        'user' => ['user.'],
        'admin' => ['admin.', 'user.']
    ];

    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('authentication');
        }
        $role = $user->role;
        $routeName = $request->route()->getName();

        foreach ($this->roleRoutes[$role] as $prefix) {
            if (str_starts_with($routeName, $prefix)) {
                return $next($request);
            }
        }
        return redirect()->route('user.main');
    }
}
