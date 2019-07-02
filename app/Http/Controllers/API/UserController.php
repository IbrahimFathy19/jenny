<?php


namespace App\Http\Controllers\API;

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\UserProfile; 
use App\User; 

use App\AssisatntUserSettings;
use App\Phone;
use App\SocialIdentity;

use Illuminate\Support\Facades\Auth; 
use Validator;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Mime\Email;

class UserController extends Controller 
{
    public $successStatus = 200;
    
    /** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function login(){ 
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            $user->api_token = $success['token'];
            $user->save();
            return response()->json(['success' => $success], $this-> successStatus); 
            
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }

    /** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function register(Request $request) 
    { 

        $validator = Validator::make($request->all(), [ 
            
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:user_account'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'sex' => ['required'],
            'birthdate' => ['required', 'date', 'date_format:Y-m-d'],
            'country' => ['required', 'string'],

        ]);
   
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $input = $request->all(); 
        
        $user_profile = RegisterController::create_user_profile($input);    
        RegisterController::create_assistant_user_settings($user_profile);
        $user_account = RegisterController::create_user_account($user_profile, $input);
        
        //$input['password'] = Hash::make($input['password']); 
        //$user = User::create($input);
        $success['token'] =  $user_account->createToken('MyApp')-> accessToken;
        $user_account->api_token = $success['token'];
        $user_account->save();
        return response()->json(['success'=>$success], $this-> successStatus); 
    }


    /** 
     * Social login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function social_login(){ 
        
        if($account = SocialIdentity::whereProviderName(request('provider'))
                    ->whereProviderId(request('provider_id'))
                    ->first()) {
    
            $user = $account->user_profile->user_account;
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            $user->api_token = $success['token'];
            $user->save();
            return response()->json(['success' => $success], $this-> successStatus); 
        } 
        else { 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
           
    }
    
    /** 
     * social Register api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function social_register(Request $request){ 
        
        $validator = Validator::make($request->all(), [ 

            'provider_id' => ['required', 'string', 'max:30', 'unique:social_identity'],
            'provider_name' => ['required', 'string', 'max:45'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:user_account'],
            'password' => ['required', 'string', 'min:8'],
            'sex' => ['required'],
            'birthdate' => ['required', 'date', 'date_format:Y-m-d'],
            'country' => ['required', 'string'],

        ]);
    
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }


        $input = $request->all(); 

        $user_profile = RegisterController::create_user_profile($input);    
        RegisterController::create_assistant_user_settings($user_profile);
        $user_account = RegisterController::create_user_account($user_profile, $input);                
        
        $user_profile->social_identity()->create([
            'provider_id'   => request('provider_id'),
            'provider_name' => request('provider_name'),
        ]);

        $success['token'] =  $user_account->createToken('MyApp')-> accessToken; 
        $user_account->api_token = $success['token'];
        $user_account->save();        
        return response()->json(['success'=>$success], $this-> successStatus); 
    }

    /** 
     * profile api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function profile() 
    { 
        $id = Auth::user()->user_profile_id;
        return response()->json(['success' => UserProfile::findOrFail($id)/**, Email::findOrFail($id), Phone::findOrFail($id)*/], $this-> successStatus); 
    }

     /** 
     * account api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function account() 
    { 
        return response()->json(['success' => Auth::user()], $this-> successStatus); 
    }


    /** 
     * assistant_settings api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function assistant_settings() 
    {
        return response()->json(['success' => AssisatntUserSettings::findOrFail(Auth::user()->user_profile_id)], $this-> successStatus); 
    }

    /** 
     * user api 
     * return all data about user
     * @return \Illuminate\Http\Response 
     */ 
    public function user() 
    {
        $id = Auth::user()->user_profile_id;
        return response()->json(['success' => [
            'profile' => UserProfile::findOrFail($id),
            'account' => Auth::user(), 
            'settings' => AssisatntUserSettings::findOrFail(Auth::user()->user_profile_id)]], $this-> successStatus); 
    }
   
}