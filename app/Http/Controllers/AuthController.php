<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Mockery\CountValidator\Exception;

class AuthController extends Controller
{
     /*
     * Login and Authentication Function
     */
    /**
     * @return mixed
     */
    public function postAuthenticate(){
        $formdata = \Request::all();
        $page_data['pagename'] = 'login';
        $credentials = [
            'email' => $formdata['email'],
            'password' => $formdata['password']
        ];
        $user = \Sentinel::findByCredentials($credentials);
        if($user){
            if (\Sentinel::validateCredentials($user, $credentials)){
                if(!(\Activation::completed($user))){
                    //User is not Activated => Account Activation Page
                    return redirect('auth/account-activation/'.\Crypt::encrypt($user->id));

                }else{
                    //User is Activated

                    //Logout all other sessions
                    \Sentinel::logout($user, true);

                    //Login in User
                    \Sentinel::authenticate($credentials);
                    return redirect('/');
                }
            }else{

                return redirect('web/sign-in')->with('message','Inavalid login credentials');
            }
        }else{
            //User Doesnt Exist => Registration Page
            return redirect('web/sign-up')->with('message','Sorry! We have no record of this email found ');
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
           return redirect('web/sign-in')->with('message','A STUUBWBT account exits with this email');
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
        $userid = \Crypt::decrypt($user);
        $page_data['user'] = \Sentinel::findById($userid);
/*        $page_data['user'] = \Sentinel::findById($userid);*/
/*        $page_data['user'] = \Sentinel::findById(\Crypt::decrypt($user));*/
        $page_data['pagename'] = "home";
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
            return redirect('web/sign-up')->with('message','Sorry! We have no record of this email found ');
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
                    return redirect('web/sign-in');
                }
            }else{
                return redirect('web/sign-in');
            }
        }else{
            //User Doesnot exist
            return redirect('web/sign-up')->with('message','Sorry! We have no record of this email found ');
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
            $friendship = new \App\Friendship();
            $friendship->user_id = $user->id;
            $friendship->friend_id = 1;
            $friendship->message = "";
            $friendship->status = 1;
            $friendship->save();
            dd('activated and friend established with Admin');
        }else{
            dd('not activated');
        }
    }

    public function postCreateStaff(Request $request){
        $data = $request->only([
           'fname', 'email', 'password', 'userroles'
        ]);

        $credentials = [
            'email'    => $data['email'],
            'password' => $data['password'],
            'first_name' => $data['fname'],
            'user_type' => 2,
        ];
        if(\Sentinel::findByCredentials($credentials)){
           dd('user exist');
        }else {
            $user = \Sentinel::registerAndActivate($credentials);      //Register User
            if(isset($data['userroles'])){
                foreach($data['userroles'] as $roleslug){
                    $role = \Sentinel::findRoleBySlug($roleslug);
                    $role->users()->attach($user);
                }
            }
            return redirect('admin/users-management');
        }
    }

    public function postAddRole(){
        $formData = \Request::all();
        $slug = \Sentinel::findRoleBySlug($formData['rslug']);
        if($slug){
            $data['validity'] = 'failed';
            $data['title'] = 'ROLE NOT CREATED';
            $data['message'] = 'Invalid "Slug Name",';
        }
        else{
            $permissions = [];
            if(isset($formData['permissions'])){
                foreach($formData['permissions'] as $permission){
                    $perm[$permission] = true;
                }
                $role = \Sentinel::getRoleRepository()->createModel()->create([
                    'name' => $formData['rname'],
                    'slug' => $formData['rslug'],
                    'permissions'=> $perm,
                ]);
            }
            $role = \Sentinel::getRoleRepository()->createModel()->create([
                'name' => $formData['rname'],
                'slug' => $formData['rslug']
            ]);
            $data['validity'] = 'success';
        }
        return json_encode($data);
    }
    
    public function getLogout(){
        \Sentinel::logout();
        return redirect('/');
    }
}
