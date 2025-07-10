<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class BoltAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $findAdmin = User::where('email', 'admin@microweber.com')->first();
        if (!$findAdmin) {
            $findAdmin = new User();
            $findAdmin->name = 'Admin';
            $findAdmin->password = Hash::make(md5(time().rand(1111, 9999)));
            $findAdmin->email = 'admin@microweber.com';
            $findAdmin->save();
        }

        if (!Auth::check()) {
            Auth::login($findAdmin);
        }

        return $next($request);
    }
}
