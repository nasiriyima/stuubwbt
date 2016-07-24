<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getEmailSettings()
    {
        $page_data['mailsettings'] = self::MailSettings();
        return view('admin.settings.email')->with($page_data);
    }
    
    public function postUpdateEmailSettings(){
        $emailsettings = \Request::all();
        self::updateSetting('outgoing_email_address', $emailsettings['outemailaddress']);
        self::updateSetting('email_password', \Crypt::encrypt($emailsettings['password']));
        self::updateSetting('email_outgoing_server', $emailsettings['server']);
        self::updateSetting('email_port', $emailsettings['port']);
        self::updateSetting('email_encryption_type', $emailsettings['encrypt-type']);
        
        return redirect()->back();
    }
    
    private static function MailSettings(){
        $mailsettings = [
            'outgoing_email_address'    =>\App\SystemPreference::systemSettings('outgoing_email_address')->value,
            'email_password'            =>\Crypt::decrypt(\App\SystemPreference::systemSettings('email_password')->value),
            'email_outgoing_server'     =>\App\SystemPreference::systemSettings('email_outgoing_server')->value,
            'email_port'                =>\App\SystemPreference::systemSettings('email_port')->value,
            'email_encryption_type'     =>\App\SystemPreference::systemSettings('email_encryption_type')->value,
                ];
        return $mailsettings;
    }
    
     private static function updateSetting($field, $data){
        $setting = \App\SystemPreference::systemSettings($field);
            $setting->value = $data;
        $setting->save();
    }
    
    private static function configMailSettings($data){
       \Config::set('mail.host',$data['email_outgoing_server']);
       \Config::set('mail.port',$data['email_port']);
       \Config::set('mail.from',array('address'=>$data['outgoing_email_address'],'name'=>'STUUB'));
       \Config::set('mail.encryption',$data['email_encryption_type']);
       \Config::set('mail.username',$data['outgoing_email_address']);
       \Config::set('mail.password',$data['email_password']); 
    }
    
    public static function sendEmail($data){
       $settings = self::MailSettings();
       self::configMailSettings($settings);

        \Mail::queue('email.accountActivation', $data, function($message) use ($data)
        {
            $message->to($data['email'], $data['name'])
                    ->subject($data['subject']);
        });
/*        \Mail::later(10, 'email.accountActivation', $data, function($message) use ($data)
        {
            $message->to($data['email'], $data['name'])
                    ->subject($data['subject']);
        });*/
    }
}
