<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssisatntUserSettings extends Model
{
    protected $table = 'assistant_user_settings';
    public $timestamps = false;    
    protected $primaryKey = 'user_profile_id';

    protected $fillable = [
        'reminder_default_assistant',
        'reminder_default_google_calendar',
        
        'alarm_snooze_interval',
        'alarm_n_snooze',
        'alarm_ringtone_name',
        
        'weather_location_country',
        'weather_location_city',
        
        'news_location_country',
        'news_interest_sport',
        'news_interest_business',
        'news_interest_entertainment',
        'news_interest_health',
        'news_interest_science',
        
        'morning_text_quote',
        'morning_text_mail',
        'morning_text_news',
        'morning_text_weather',
    ];    
    
    public function user_profile() {
        return $this->belongsTo('App\UserProfile');
    }

   
    
}
