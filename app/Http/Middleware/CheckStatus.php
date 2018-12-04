<?php
namespace App\Http\Middleware;
use Closure;
use Auth;
use App\Models\Admin;
class CheckStatus

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
        $response = $next($request);
        //If the status is not approved redirect to login 
        if(Auth::check() && Auth::user()->status != '1'){
            Auth::logout();
            $request->session()->flash('alert-danger', 'Your Account is deactivated.');
            return redirect('/login')->with('erro_login', 'Your error text');
        }
        return $response;
    }
}