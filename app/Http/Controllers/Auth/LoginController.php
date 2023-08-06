<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Configuration;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => ['required'],
            'password' => ['required', 'min:6', 'max:10'],
        ]);

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if (auth()->user()->role == 1) {

                return redirect('admin-home');
            } else if (auth()->user()->role == 2) {

                return redirect('staf-home');
            } else if (auth()->user()->role == 3) {

                return redirect('user-home');
            }
        } else {
            session()->flash('error', 'Log masuk gagal. Sila cuba lagi');
            return redirect()->route('login')
            ->withErrors([
                'email' => 'Emel dan kata laluan tidak sepadan',
                'password' => 'Emel dan kata laluan tidak sepadan',
            ]);

        }
    }
}
