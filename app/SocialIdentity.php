<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialIdentity extends Model
{
    
    protected $table = 'social_identity';
    protected $primaryKey = 'user_profile_id';
    public $timestamps = false;    
    
    protected $fillable = ['user_profile_id', 'provider_name', 'provider_id'];
    
    public function user_profile() {
        return $this->belongsTo('App\UserProfile');
    }
   
}
