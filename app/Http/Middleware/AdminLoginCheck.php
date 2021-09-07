<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class AdminLoginCheck
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
        // $user = \App\Admin::where('id', Session::get)->first();
        if (!Session::get('id_admin') && Session::get('user') != 'admin') {
            return redirect('admin/');
        }
        return $next($request);
    }
}
