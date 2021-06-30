<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
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
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function redirectTo()
    {
        $user = Auth::user();

        if ($user->id_level == 1 | $user->id_level == 2) {
            return $this->redirectTo = '/admin/dashboard';
        } else {
            return $this->redirectTo = '/siswa/dashboard';
        }
    }

    public function username()
    {
        $login = request()->input('email');

        if (!is_null($login)) {
            if (is_numeric($login)) {
                $field = 'ni';
            }

            request()->merge([$field => $login]);
            return $field;
        }
    }

    public function showLoginForm()
    {
        return view('login');
    }
}