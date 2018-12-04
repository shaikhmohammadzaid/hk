<?php
namespace App\Http\Middleware;
use Closure;
use Auth;
use App\Models\Admin;
use BD;
class AdminCheckStatus
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
        $sql = "SELECT * FROM admins WHERE id= 6  AND 'job_title'= 'employee' ";
        $active= DB::select($sql);

        echo $active;
        //If the status is not approved redirect to login
        if(Auth::Admin() &&   $active  == '1'){
            Auth::logout();
            $request->session()->flash('alert-danger', 'Your Account is deactivated.');
            return redirect('/login')->with('erro_login', 'Your error text');
        }
        exit();
        return $response;
    }
}