<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Network;
use Exception;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;


use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
          
            
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $referralCode = Str::random(10);
    
        if (isset($data['refral'])) {
            $userData = User::where('refral', $data['refral'])->get();
            if (count($userData) > 0) {
                $user = User::create([
                    'name' => $data['name'],
                    'username' => $data['username'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'refral' => $referralCode,
                    'password' => Hash::make($data['password']),
                ]);
    
                Network::create([
                    'refral' => $data['refral'],
                    'user_id' => $user->id,
                    'parent_user_id' => $userData[0]['id'],
                ]);
    
                // Log in the user
                Auth::login($user);
    
                return $user;
            } else {
                return null;
            }
        } else {
            $user = User::create([
                'name' => $data['name'],
                'username' => $data['username'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'refral' => $referralCode,
                'password' => Hash::make($data['password']),
            ]);
    
            $domain=URL::to('/');
            $url=$domain.'/register?refral='.$referralCode;
            $data['url']=$url;
            $data['name']=$data['name'];
            $data['title']='Register';
            try {
                Mail::send('backend.admin.emails.register', ['data' => $data], function ($message) use ($data) {
                    $message->to($data['email'])->subject($data['title']);
                });
            } catch (Exception $e) {
                // Log the exception for debugging
                \Log::error('Email sending error: ' . $e->getMessage());
            }
            // Log in the user
            Auth::login($user);

         
    
            return $user;
        }
    }
    
    
    
}
