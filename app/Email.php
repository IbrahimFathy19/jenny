<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use Notifiable;
    
    protected $table = 'email';
    protected $fillable = ['user_profile_id', 'email'];
    protected $primaryKey = 'user_profile_id';

    public function user_profile() {
        return $this->belongsTo('App\UserProfile');
    }
}
