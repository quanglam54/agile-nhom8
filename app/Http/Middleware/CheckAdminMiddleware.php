<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckAdminMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            // đã đăng nhập thành công r
            if (Auth::user()->role == '1') {
                return $next($request);

            } else {
                // điều hướng trang user
            }
        } else {
            return redirect()->route('login')->with([
                'message' => 'Bạn phải đăng nhập trước'
            ]);
        }
        // role dc đi tiếp vào controller
    }
}