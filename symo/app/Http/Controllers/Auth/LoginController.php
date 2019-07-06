<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/home';

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
        // Check validation
        $this->validate($request, [
            'mobile' => 'required|regex:/[0-9]{10}/|digits:10',
        ]);

        // Get user record
        $user = User::where('mobile', $request->get('mobile'))->first();

        // Check Condition Mobile No. Found or Not
        if($request->get('mobile') != $user->mobile) {
            \Session::put('errors', 'اطلاعات شما اشتباست!!');
            return back();
        }

        // Set Auth Details
        \Auth::login($user);

        // Redirect home page
        return redirect()->route('home');
    }

}
