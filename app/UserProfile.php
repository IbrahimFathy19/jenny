<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class UserProfile extends Model
{
    protected $table = 'user_profile';
    protected $primaryKey = 'id';
    public $timestamps = false;

      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'country', 'sex', 'timezone', 'birthdate', 'profile_photo_path'
    ];

    public function user_account() {
        return $this->HasOne('\App\User');
    }

    public function social_identity() {
        return $this->hasMany('App\SocialIdentity');
    }

    public function assistant_user_settings() {
        return $this->HasOne('\App\AssisatntUserSettings');
    }
    
    public function email() {
        return $this->hasMany('App\Email');
    }

    public function phone() {
        return $this->hasMany('App\Phone');
    }
    
    public function session() {
        return $this->hasMany('App\Session');
    }
}
