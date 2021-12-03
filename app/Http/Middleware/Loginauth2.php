<?php

namespace App\Http\Middleware;

use Closure;

class Loginauth2
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

        if(isset($_SESSION['role'])){

            if($_SESSION['role'] == 'super'){

                echo "<script>window.location.href='http://localhost/careforu/public/';</script>";

            }elseif ($_SESSION['role'] == 'buysell') {
                
                echo "<script>window.location.href='http://localhost/careforu/public/';</script>";

            }elseif ($_SESSION['role'] == 'stockadmin') {
                
                echo "<script>window.location.href='http://localhost/careforu/public/stocks';</script>";

            }elseif ($_SESSION['role'] == 'patience') {
                
                echo "<script>window.location.href='http://localhost/careforu/public/patiencedatas';</script>";

            }

        }

        return $next($request);
    }
}
