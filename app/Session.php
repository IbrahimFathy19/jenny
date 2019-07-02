<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use Notifiable;
    
    protected $table = 'session';
    protected $fillable = ['user_profile_id', 'room_id', 'check_in_date', 'check_out_date', 'guest_rate', 'hotel_id'];
    protected $primaryKey = 'user_profile_id';

    public function user_profile() {
        return $this->belongsTo('App\UserProfile');
    }
}
