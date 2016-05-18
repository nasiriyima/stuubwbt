<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AuthController extends Controller
{
     /*
     * Login and Authentication Function
     */
    public function postAuthenticate(){
        $formdata = \Request::all(); 
        $credentials = [
            'email' => $formdata['email'],
            'password' => $formdata['password']
        ];
        $user = \Sentinel::findByCredentials($credentials);
        if($user){
            if(!(\Activation::completed($user))){
                //User is not Activated => Account Activation Page
            }else{
                //User is Activated
                \Sentinel::logout($user, true);
                if (\Sentinel::authenticate($credentials)){
                    //User is Authenticated => Login
                    return redirect('/');
                }else{
                    //Invalid user Credentials
                } 
            }    
        }else{
            //User Doesnt Exist => Registration Page
            dd('User doesnt Exists');
        }
    }
    
    /*
     * Registeration Function
     */
    public function postRegistration(){
       $formdata = \Request::all();
       $credentials = [
            'email'    => $formdata['email'],
            'password' => $formdata['password'],
            'first_name' => $formdata['name'],
            'user_type' => 1,
       ];
       if(\Sentinel::findByCredentials($credentials)){
          dd('User Exist Already- Login Page');
       }else{
            $user = \Sentinel::register($credentials);      //Register User
            $activation = \Activation::create($user);       //Create User Activation
            $maildata = [
                'email' => $formdata['email'],
                'name' => $formdata['name'],
                'subject' => 'STUUB CBT Registration',
                'activationcode' => $activation->code,
                'activationurl'=> url('auth/verify-account/'.\Crypt::encrypt($activation->code).'/'.\Crypt::encrypt($formdata['email']))
                ];
                EmailController::sendEmail($maildata);
            return redirect('auth/account-activation/'.\Crypt::encrypt($user->id));
       }
       
    }
    
    public function getAccountActivation($user)
    {
        \Activation::removeExpired(); // Remove all Expired Activations
        $page_data['user'] = \Sentinel::findById(\Crypt::decrypt($user));
        if($page_data['user']){
            if(\Activation::exists($page_data['user'])){
                if(!(\Activation::completed($page_data['user']))){
                    return view('frontweb.confirmationpage')->with($page_data);
                }else{
                    dd('Redirect to Login Page as User as an active account'); 
                }
            }else{
                dd('No Activation code found, or Must have expired');
            }
        }else{
            dd('user exist not');
        }
    }
    
    
    public function postAccountActivation()
    {
        $formdata = \Request::all();
        \Activation::removeExpired(); // Remove all Expired Activations
        $page_data['user'] = \Sentinel::findById(\Crypt::decrypt($formdata['user']));
        if($page_data['user']){
            if(\Activation::exists($page_data['user'])){
                if(!(\Activation::completed($page_data['user']))){
                    self::activateaccount($page_data['user'], $formdata['activationcode']);
                }else{
                    dd('Redirect to Login Page as User as an active account'); 
                }
            }else{
                dd('Redirect to Login Page as User as an active account');
            }
        }else{
            dd('user exist not');
        }
    }
    
    public function getVerifyAccount($code, $user)
    {
        $activationcode = \Crypt::decrypt($code);
        $credential = ['email' => \Crypt::decrypt($user)];
        $page_data['user'] = \Sentinel::findByCredentials($credential); 
        \Activation::removeExpired(); // Remove all Expired Activations
        if($page_data['user']){
            if(\Activation::exists($page_data['user'])){
                if(!(\Activation::completed($page_data['user']))){
                    self::activateaccount($page_data['user'], $activationcode);
                }else{
                    dd('Redirect to Login Page as User as an active account'); 
                }
            }else{
                dd('Redirect to Login Page as User as an active account');
            }
        }else{
            dd('user exist not');
        }
    }
    
    private static function activateaccount($user, $code){
        if (\Activation::complete($user, $code)){
            dd('activated');
        }else{
            dd('not activated');
        }
    }
    
    public function getLogout(){
        \Sentinel::logout();
        return redirect()->back();
    }
}
