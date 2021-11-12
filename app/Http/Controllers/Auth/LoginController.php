<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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
    // google login codes
    // public function redirectToProvider($driver)
    // {
    //     return Socialite::driver($driver)->redirect();
    // }

    // public function handleProviderCallback($provider)
    // {
    //     $user = Socialite::driver($provider)->user();
    //     $authUser = $this->findOrCreateUser($user, $provider);
    //     Auth::login($authUser, true);
    //     return redirect($this->redirectTo);
    // }

    // public function findOrCreateUser($user, $provider)
    // {

    //     $authUser = User::where('provider_id', $user->id)->first();
    //     if ($authUser) {
    //         return $authUser;
    //     }
    //     dd($user);

    //     return User::create([
    //         'name'     => $user->name,
    //         'email'    => $user->email,
    //         'provider' => $provider,
    //         'password' => "123456789",
    //         'provider_id' => $user->id
    //     ]);
    // }
    // google login codes

}
