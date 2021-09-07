<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class PenghuniLoginCheck
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
        // $user = \App\Penghuni::where('id', Session::get)->first();
        if (!Session::get('id_penghuni') && Session::get('user') != 'penghuni') {
            return redirect('penghuni/');
        }
        return $next($request);
    }
}
