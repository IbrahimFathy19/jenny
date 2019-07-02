<?php

namespace App\Http\Controllers;

use App\AssisatntUserSettings;
use App\UserProfile;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


use Illuminate\Http\Request;

class Settings extends Controller
{
    /**
     * Where to redirect users after update.
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
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function get_assistant_settings()
    {
        $user = Auth::user();
        $settings = DB::table('assistant_user_settings')->
        where('user_profile_id', $user['user_profile_id'])->
        first();

        $country   = INPUT::get('country');
       
        return view('assistant-settings', ['settings' => $settings, 'country' => $country]);
    }


    public function get_profile_settings()
    {
        $user = Auth::user();
        $user_data = DB::table('user_profile')
        ->where('id', $user['user_profile_id'])
        ->first();
        return view('profile-settings', ['user_data' => $user_data]);
    }

    protected function update_assistant_settings(Request $request, $user_profile_id)
    {

        DB::table('assistant_user_settings')
            ->where('user_profile_id', $user_profile_id)
            ->update(
                [
                    'reminder_default_assistant' => $request->input('reminder_default_assistant'),
                    'reminder_default_google_calendar' => $request->input('reminder_default_google_calendar'),
                    'alarm_snooze_interval' => $request->input('alarm_snooze_interval'),
                    'alarm_n_snooze' => $request->input('alarm_n_snooze'),
                    'alarm_ringtone_name' => $request->input('alarm_ringtone_name'),
                    'weather_location_country' => $request->input('weather_location_country'),
                    'weather_location_city' => $request->input('weather_location_city'),
                    'news_location_country' => $request->input('news_location_country'),
                    'news_interest_sport' => $request->input('news_interest_sport'),
                    'news_interest_business' => $request->input('news_interest_business'),
                    'news_interest_entertainment' => $request->input('news_interest_entertainment'),
                    'news_interest_health' => $request->input('news_interest_health'),
                    'news_interest_science' => $request->input('news_interest_science'),
                    'morning_text_quote' => $request->input('morning_text_quote'),
                    'morning_text_mail' => $request->input('morning_text_mail'),
                    'morning_text_news' => $request->input('morning_text_news'),
                    'morning_text_weather' => $request->input('morning_text_weather')
                ]);
            return redirect($this->redirectTo);      
    }


    protected function update_profile_settings(Request $request, $user_profile_id)
    {
        DB::table('user_profile')
            ->where('user_profile_id', $user_profile_id)
            ->update(
                [
                    
                ]);
            return redirect($this->redirectTo);      
    }
}
