<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ADMINPANEL;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin_user')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.admin_login');
    }

    protected function guard()
    {
        return Auth::guard('admin_user');
    }

    public function logout() 
    {
        Auth::guard('admin_user')->logout();    

        return redirect()->route('admin.dashboard');
    }

    protected function authenticated(Request $request, $user)
    {
        $user->update([
            'ip' => $request->ip(),
            'user_agent' => $request->server("HTTP_USER_AGENT")
        ]);
    }
}
