<?php

namespace App\Http\Middleware;

use Closure;

class Loginauth
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
        
        if (session_status() == PHP_SESSION_NONE) {
            
            session_start();
            
        }

        if(!isset($_SESSION['role'])){

            session_destroy();

            echo "<script>window.location.href='http://localhost/careforu/public/login';</script>";
        }

        return $next($request);

    }
}
