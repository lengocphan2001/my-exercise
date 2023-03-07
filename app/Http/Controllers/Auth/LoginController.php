<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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

    public function login(LoginFormRequest $request)
    {
        $input = $request->all();
        $data = $request->validated();
        if (!$data)
            return redirect()->back()->withErrors($request->messages());
        else {
            if (Auth::attempt(['email' => $input['email'], 'password' => $input['password']])) {
                if (auth()->user()->is_admin == 1) {
                    return redirect()->route('admin.user.index');
                } else {
                    if (!auth()->user()->is_first_login) {
                        return redirect()->route('user.index');
                    }else{
                        $user = auth()->user();
                        return redirect()->route('user.make', $user);
                    }
                }
            } else {
                return redirect()->back()->with(['error' => 'Tên tài khoản hoặc mật khẩu không đúng']);
            }
        }
    }
}
