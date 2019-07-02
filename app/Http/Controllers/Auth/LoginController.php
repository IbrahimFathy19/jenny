<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;



use Auth;
use Socialite;
Use App\UserProfile;
Use App\User;
use App\SocialIdentity;

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
    protected $redirectTo = '/assistant-settings';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return redirect('/login');
        }

        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect($this->redirectTo);
    }


    public function findOrCreateUser($providerUser, $provider)
    {
        $account = SocialIdentity::whereProviderName($provider)
                   ->whereProviderId($providerUser->getId())
                   ->first();

        if ($account) {
            return $account->user_profile->user_account;
        } else {

            $user_account = User::whereEmail($providerUser->getEmail())->first();
            if (! $user_account) {

                //extract user name
                $userName  = $providerUser->getName();
                $name = explode(" ", $userName);

                $data = array();
                $data['first_name'] = $name[0];
                $data['last_name'] = $name[1];
                $data['sex'] = 0; // not known
                $data['country'] = ""; //not known
                $data['birthdate'] = '1900-01-01'; //default birthdate
                $data['profile_photo_path'] = $providerUser->getAvatar();
                $data['email'] = $providerUser->getEmail();
                $data['password'] = Hash::make($providerUser->getId());


                //create data rows
                $user_profile = RegisterController::create_user_profile($data);

                RegisterController::create_assistant_user_settings($user_profile);

                $user_account = RegisterController::create_user_account($user_profile, $data);

                $user_profile->social_identity()->create([
                    'provider_id'   => $providerUser->getId(),
                    'provider_name' => $provider,
                ]);


            }
            
            return $user_account;
        }
    }

 }
