<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\AssisatntUserSettings;
use App\UserProfile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:user_account'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'sex' => ['required'],
            'accept_terms' => ['required'],
            'birthdate' => ['required', 'date', 'date_format:Y-m-d'],
            'country' => ['required', 'string'],
            'profile_photo_path' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);
    }


    public static function create_user_profile(array $data)
    {
        $fileName = 'default.png';
        if (! is_string($data['profile_photo_path'])) {
            if ($data['profile_photo_path']->isValid()) {
                $destinationPath = public_path('images/users');
                $extension = $data['profile_photo_path']->getClientOriginalExtension();
                $fileName = 'images/users/' . uniqid() . '.' .$extension;
                $data['profile_photo_path']->move($destinationPath, $fileName);
            }
        }
        else {
            $fileName = $data['profile_photo_path'];
        }
        
        //create user credintials
        $user_profile = UserProfile::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'sex' => $data['sex'],
            'birthdate' => $data['birthdate'],
            'country' => $data['country'],
            'profile_photo_path' => $fileName,
            
            ]);
            
            return $user_profile;
    }

    public static function create_assistant_user_settings($user_profile)
    {
        $user_profile->assistant_user_settings()->create([

            //reminder settings
            'reminder_default_assistant' => 1,
            'reminder_default_google_calendar' => 0,

            //alarm settings
            'alarm_snooze_interval' => 5, //5 minutes
            'alarm_n_snooze' => 0,//no snooze
            'alarm_ringtone_name' => "Test", //provide a ringtone here

            //weather settings
            'weather_location_country' => "", //
            'weather_location_city' => "", //

            //news settings
            'news_location_country' => "",//
            'news_interest_sport' => 0, //
            'news_interest_business' => 1, //
            'news_interest_entertainment' => 0, //
            'news_interest_health' => 0, //
            'news_interest_science' => 0, //

            //morning_text settings
            'morning_text_quote' => 1, //
            'morning_text_mail' => 1, //
            'morning_text_news' => 0, //
            'morning_text_weather' => 0, //
        ]);
    }

    public static function create_user_account($user_profile, $data)
    {
        $user_account = $user_profile->user_account()->create([
            'email' => $data['email'],            
            'password' => Hash::make($data['password']),
        ]);
        return $user_account;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        $user_profile = $this->create_user_profile($data);
        
        $this->create_assistant_user_settings($user_profile);

        $user_account = $this->create_user_account($user_profile, $data);

        return $user_account;
    }
}