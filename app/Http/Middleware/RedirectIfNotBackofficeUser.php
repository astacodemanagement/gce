<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotBackofficeUser
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
        $backOfficeRoles = ['superadmin', 'manager', 'kasir', 'gudang', 'finance'];

        if (!Auth::check() || !in_array(Auth::user()->roles->pluck('name')[0], $backOfficeRoles)) {
            return redirect('/');
        }

        return $next($request);
    }
}
