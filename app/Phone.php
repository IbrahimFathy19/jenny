<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use Notifiable;
    
    protected $table = 'phone';
    protected $fillable = ['user_profile_id', 'phone'];
    protected $primaryKey = 'user_profile_id';

    public function user_profile() {
        return $this->belongsTo('App\UserProfile');
    }
}
