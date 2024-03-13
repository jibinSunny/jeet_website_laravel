<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Country;
use App\Models\Setting;
use App\Models\Timezone;
use Validator;
use Illuminate\Http\Request;
use Storage;
use Config;
use Illuminate\Support\Facades\Http;

class InstallerController extends Controller
{
    public function start(Request $request){
        $this->data['errors']  = [];
        $this->data['success'] = [];

        // Check PHP version
        if ( phpversion() < "5.6" ) {
            $this->data['errors'][] = 'You are running PHP old version';
        } else {
            $phpversion              = phpversion();
            $this->data['success'][] = ' You are running PHP ' . $phpversion;
        }

        // Check Mcrypt PHP extension
        if(version_compare(phpversion(), '7.2', '<')) {
            if ( !extension_loaded('mcrypt') ) {
                $this->data['errors'][] = 'Mcriypt PHP extension unloaded!';
            } else {
                $this->data['success'][] = 'Mcriypt PHP extension loaded!';
            }

            // Check GD PHP extension
            if ( !extension_loaded('gd') ) {
                $this->data['errors'][] = 'GD PHP extension unloaded';
            } else {
                $this->data['success'][] = 'GD PHP extension loaded';
            }
        }

        // Check Mysqli PHP extension
        if ( !extension_loaded('mysqli') ) {
            $this->data['errors'][] = 'Mysqli PHP extension unloaded';
        } else {
            $this->data['success'][] = 'Mysqli PHP extension loaded';
        }

        // Check MBString PHP extension
        if ( !extension_loaded('mbstring') ) {
            $this->data['errors'][] = 'MBString PHP extension unloaded';
        } else {
            $this->data['success'][] = 'MBString PHP extension loaded';
        }

        // Check CURL PHP extension
        if ( !extension_loaded('curl') ) {
            $this->data['errors'][] = 'CURL PHP extension unloaded!';
        } else {
            $this->data['success'][] = 'CURL PHP extension loaded!';
        }

        // Check Zip PHP extension
        if(version_compare(phpversion(), '7.3', '<')) {
            if ( !extension_loaded('zip') ) {
                $this->data['errors'][] = 'Zip PHP extension unloaded';
            } else {
                $this->data['success'][] = 'Zip PHP extension loaded';
            }
        }

        // Check Internet
        $connected = @fsockopen("www.example.com", 80);
                                        //website, port  (try 80 or 443)

        if ( $connected ) {
            $this->data['success'][] = 'Internet connection OK';
        } else {
            $this->data['errors'][] = 'Internet connection problem';
        }
        // Check allow_url_fopen
        if ( ini_get('allow_url_fopen') ) {
            $this->data['success'][] = 'allow_url_fopen is enable';
        } else {
            $this->data['errors'][] = 'allow_url_fopen is disable. enable it to your php.ini file';
        }
        return view('install/start',$this->data);
    }
    public function purchaseCode(Request $request){
        if($_POST){
            $validator = Validator::make($request->all(), [
                'username' => 'required|min:6|max:12',
                'purchase_code' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect('purchase')
                            ->withErrors($validator)
                            ->withInput();
            }else{
                $response = Http::get('http://localhost/jeet-super-admin/api/validate-purchase', [
                    'username' => $request->username,
                    'purchase_code' => $request->purchase_code,
                ]);
                $json = $response->json();
                if($json['status']==1){
                    $setting = Setting::first();
                    $setting->purchase_code = $request->purchase_code;
                    $setting->save();
                    return redirect('timezone');
                }else{
                    $data['message'] = $json['message'];
                    return view('install/purchase',$data);
                }
            }
        }else{
            return view('install/purchase');
        }
    }
    public function databaseCheck(Request $request){
        if($_POST){
            $validator = Validator::make($request->all(), [
                'hostname' => 'required',
                'database' => 'required',
                'username' => 'required',
                'password' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect('database-check')
                            ->withErrors($validator)
                            ->withInput();
            }else{
                Config::set("database.connections.mysql", [
                    // "host" => $request->hostname,
                    "database" => $request->database,
                    "username" => $request->username,
                    "password" => $request->password
                ]);
                return redirect('database-check');
            }
        }else{
            return view('install/database');
        }
    }
    public function timeZone(Request $request){
        if($_POST){
            $setting = Setting::first();
            $setting->time_zone = $request->timezone;
            $setting->default_country = $request->country;
            $setting->save();
            return redirect('site');
        }else{
            // $timezone =
            $setting = Setting::first();
            if($setting->purchase_code){
                $data['timezones'] = Timezone::all();
                $data['countries'] = Country::all();
                $data['settings'] = $setting;
                return view('install/timezone',$data);
            }else{
                return redirect('purchase');
            }
        }
    }
    public function site(Request $request){
        if($_POST){
            $setting = Setting::first();
            $setting->site_name = $request->site_name;
            $setting->phone = $request->site_name;
            $setting->site_name = $request->site_name;
            $setting->admin_name = $request->admin_name;
            $setting->currency_code = $request->currency_code;
            $setting->currency_symbol = $request->currency_symbol;
            $setting->username = $request->username;
            $setting->address = $request->address;
            $setting->save();
            $admin = Admin::first();
            $admin->emal = $request->username;
            $admin->password = $request->password;
            $admin->save();
            return redirect('done');
        }else{
            $data['settings'] = Setting::first();
            return view('install/site',$data);
        }
    }
    public function done(Request $request){
        return view('install/done');
    }
}
