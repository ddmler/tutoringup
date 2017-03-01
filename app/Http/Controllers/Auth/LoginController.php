<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\User;


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

    use AuthenticatesUsers{
        login as protected traitlogin;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if (request('moodle_login') == "on"){

            $token = env('MOODLE_KEY');

            $client = new Client();
            $res = $client->request('GET', 'http://api.uni-potsdam.de/endpoints/moodleAPI/1.0/login/token.php?username=' . request('email') . '&password=' . request('password') . '&service=moodle_mobile_app&moodlewsrestformat=json', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token
                ]
            ]);

            $parsed = json_decode($res->getBody(), true);

            if (array_key_exists("token", $parsed)) {
                // register, login
                $user = User::firstOrNew(['email' => request('email').'@uni-potsdam.de']);
                $user->name = request('email');
                $user->password = bin2hex(random_bytes(5));
                $user->save();

                auth()->login($user);

                return redirect('/');
            }

        } elseif ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }
        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
}
