<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsPs
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::User()->role == 'PembimbingSiswa') {
            return $next($request);
        }else {
            return redirect()->route('error.permision');
        }
    }
}
